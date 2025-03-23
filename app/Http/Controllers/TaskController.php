<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Mail\TaskAssigned;
use App\Services\CsvExportService;
use Illuminate\Console\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize('viewAny',Task::class);
        $columns = ['title', 'status', 'priority', 'due_date'];
        $query = Task::with('user', 'customer')->latest();
    
        // Search by Title or Customer Name
        if (request()->filled('search')) {
            $search = request('search');
            $query->where('tasks.title', 'like', "%{$search}%")
                  ->orWhereHas('customer', function ($q) use ($search) {
                      $q->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%");
                  });
        }
    
        // Filter by Status
        if (request()->filled('status')) {
            $query->where('status', request('status'));
        }
    
        // Filter by Priority
        if (request()->filled('priority')) {
            $query->where('priority', request('priority'));
        }
    
        // Trashed Records Filter
        if (request()->has('trashed')) {
            $query->onlyTrashed();
        }
    
        // Get distinct values for filters
        $statuses = Task::select('status')->distinct()->pluck('status');
        $priorities = Task::select('priority')->distinct()->pluck('priority');
    
        $tasks = $query->paginate(15);
    
        return view('tasks.index', compact('tasks', 'columns', 'statuses', 'priorities'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Task::class);
        $users = User::orderBy('first_name', 'asc')->get();
        $customers = Customer::orderBy('first_name', 'asc')->get();
        return view('tasks.create', compact('users','customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $this->authorize('create',Task::class);
        $task = Task::create($request->validated());

        if($request->has('customer_id') && $request->customer_id){
            $taskFor = $request->has('customer_id') ? Customer::find($request->customer_id) : null;
        }
        $assignedTo = User::where('id', $request->user_id)->firstOrFail();
        Mail::to($assignedTo->email)->queue(new TaskAssigned($task,$assignedTo,$taskFor));
        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $this->authorize('view',$task);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('update',$task);
        $customers = Customer::select(['id', 'first_name', 'last_name'])->orderBy('first_name','asc')->get();
        $users = User::select(['id','first_name','last_name'])->orderBy('first_name','asc')->get();
        return view('tasks.edit',compact('task','customers','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('update',$task);
        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('success','Task edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete',$task);
        $task->delete();

        return redirect()->route('tasks.index')->with('success','Task deleted successfully');
    }
    public function trash()
    {
        $tasks = Task::onlyTrashed()->paginate(15);
        return view('tasks.trash', compact('tasks'));
    }

    /**
     * Restore a soft deleted task.
     */
    public function restore(Task $task,$id)
    {
        $this->authorize('restore',$task);
        $task = Task::onlyTrashed()->findOrFail($id);
        $task->restore();
        return redirect()->route('tasks.index')->with('success', 'Task restored successfully');
    }

    /**
     * Permanently delete a soft deleted task.
     */
    public function forceDelete(Task $task,$id)
    {
        $this->authorize('forceDelete',$task);
        $task = Task::onlyTrashed()->findOrFail($id);
        $task->forceDelete();
        return redirect()->route('tasks.trash')->with('success', 'Task permanently deleted');
    }

    public function generateCsv(CsvExportService $csvExportService)
    {
        $tasks = Task::latest()->get();
    
        $data = $tasks->map(function ($task) {
            return [
                $task->title,
                $task->description,
                $task->user_id,
                $task->customer_id,
                $task->status,
                $task->priority,
                $task->due_date,
                $task->completed_at,
                optional($task->due_date)->format('Y-m-d H:i:s'),
                optional($task->completed_at)->format('Y-m-d H:i:s'),
            ];
        });
    
        return $csvExportService->generateCsv($data, 'tasks.csv', [
            'Title', 'Description', 'User ID', 'Customer ID', 'Status', 'Priority', 'Due Date', 'Completed At'
        ]);
    }
}
