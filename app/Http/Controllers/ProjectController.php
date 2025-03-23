<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Customer;
use App\Mail\ProjectCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Notifications\ProjectAssignedNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProjectController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewANy',Project::class);
        $columns = ['name', 'status', 'priority', 'start_date', 'budget'];
        $query = Project::with(['customer'])->latest();
    
        // Search Filter
        if (request()->filled('search')) {
            $search = request('search');
            $query->where('name', 'like', "%{$search}%");
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
        $statuses = Project::select('status')->distinct()->pluck('status');
        $priorities = Project::select('priority')->distinct()->pluck('priority');
    
        $projects = Cache::remember('projects',now()->addWeeks(2),function (){
            return Project::all();
        });
        $projects = $query->paginate(15);
    
        return view('projects.index', compact('projects', 'columns', 'statuses', 'priorities'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Project::class);
        $customers = Customer::select(['id', 'first_name', 'last_name'])->orderBy('first_name','asc')->get();
        return view('projects.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
    
        $this->authorize('create', Project::class);
        Cache::forget('projects');
        $project = Project::create($request->validated());
        $customer = Customer::where('id', $request->customer_id)->firstOrFail();
        $createdBy = Auth::user() ?? new User();
        Mail::to($customer->email)->queue(new ProjectCreated($project,$customer,$createdBy));
        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $this->authorize('view',$project);
        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        $customers = Customer::select(['id', 'first_name', 'last_name'])->orderBy('first_name','asc')->get();
        return view('projects.edit', compact('project','customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);
        Cache::forget('projects');
        $project->update($request->validated());
        return redirect()->route('projects.index')->with('success', 'Project edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
    public function restore(Project $project,$id)
{
    $this->authorize('restore',$project);
    $project = Project::onlyTrashed()->findOrFail($id);
    $project->restore();

    return redirect()->route('projects.index')->with('success', 'Project restored successfully');
}
public function forceDelete(Project $project,$id)
{
    $this->authorize('forceDelete',$project);
    $project = Project::onlyTrashed()->findOrFail($id);
    $project->forceDelete();

    return redirect()->route('projects.index')->with('success', 'Project permanently deleted');
}

}