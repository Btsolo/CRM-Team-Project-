@extends('layouts.app')

@section('content')
<!-- Main Content -->
<main class="flex-1 p-6 bg-white md:ml-10 transition-all duration-300 rounded-tl-xl shadow-inner">

    <!--Task creation form-->
    <section class="mb-8"> 
        <h2 class="text-2xl font-bold text-Gray-800 mb-4">Create new task</h2>
        <form id="task-form" class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
                <!--Task Name-->
                <div>
                    <label for="task-name" class="block text-gray-700 font-medium text-sm">Task Name</label>
                    <input type="text" id="task-name" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <!--assigned to-->
            <div>
                <label for="assigned-to" class="block text-sm font-medium text-gray-700">Assigned To </label>
                <select name="" id="assigned-to" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <option value="staff1">Staff Member 1</option>
                    <option value="staff2">Staff Member 2</option>
                </select>
            </div>

            <!--Due dates-->
            <div>
                <label for="due-date" class="block text-sm font-medium text-gray-700"></label>
                <input type="datetime-local" id="due-date" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!--Status-->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <option value="pending">Pending</option>
                    <option value="in-progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
        
             <!-- Description -->
        <div class="mt-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" rows="3" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
        </div>
        
        </form>
    </section>
    <!-- Submit Button -->
    <div class="p-2">
        <button type="submit" class=" bg-gray-600 text-white px-4 py-2 rounded-md hover:text-blue-800">
            Create Task
        </button>
    </div>
     <!-- Task List -->
<section>
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Task List</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-3 text-left text-sm font-semibold text-gray-700">Title</th>
                    <th class="p-3 text-left text-sm font-semibold text-gray-700">Assigned To</th>
                    <th class="p-3 text-left text-sm font-semibold text-gray-700">Due Date</th>
                    <th class="p-3 text-left text-sm font-semibold text-gray-700">Status</th>
                </tr>
            </thead>
            @foreach ($tasks as $task )
            <tbody class="divide-y divide-gray-200">
               <td>{{ $task->title }}</td>
               <td>{{ $task->user->first_name. ' ' .$task->user->last_name }}</td>
               <td>{{ $task->due_date }}</td>
               <td>{{ $task->status }}</td>
            </tbody>
            @endforeach
        </table>
    </div>
</section>
 </main>
@endsection