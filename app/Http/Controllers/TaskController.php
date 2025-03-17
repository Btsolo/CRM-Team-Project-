<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Customer;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Task::with('user', 'customer')->latest()->paginate(10);

        if(request()->filled('search')){
            $search = request('search');
            $query->where('title','like',"%{$search}%")
                  ->orwhereHas('customer',function($q) use($search){
                    $q->where('first_name','like',"%{$search}%")
                      ->orwhere('last_name','like',"%{$search}%");
                  });
        }

        $tasks = $query->paginate(15);

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('first_name', 'asc')->get();
        $customers = Customer::orderBy('first_name', 'asc')->get();
        
        return view('tasks.create', compact('users','customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        Task::create($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('success','Task edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success','Task created successfully');
    }
}
