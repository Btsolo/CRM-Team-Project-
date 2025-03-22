<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Task Assigned</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Header -->
        <div class="bg-blue-600 px-6 py-4">
            <h1 class="text-white text-xl font-bold text-center">New Task Assigned</h1>
        </div>

        <!-- Content -->
        <div class="p-6">
            <p class="text-gray-700 mb-4">Hello {{ $assignedTo->name }},</p>
            
            <p class="text-gray-700 mb-4">A new task has been assigned to you by {{ $taskFor->name }}.</p>
            
            <!-- Task Details Card -->
            <div class="bg-gray-50 rounded-lg p-5 border border-gray-200 mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $task->title }}</h2>
                <div class="space-y-2">
                    <p class="text-gray-700"><span class="font-medium">Description:</span> {{ $task->description }}</p>
                    <p class="text-gray-700"><span class="font-medium">Due Date:</span> {{ $task->due_date }}</p>
                    <p class="text-gray-700"><span class="font-medium">Priority:</span> 
                        <span class="
                            @if($task->priority == 'high') text-red-600 
                            @elseif($task->priority == 'medium') text-yellow-600 
                            @else text-green-600 
                            @endif
                            font-medium
                        ">
                            {{ ucfirst($task->priority) }}
                        </span>
                    </p>
                </div>
            </div>
            
            <p class="text-gray-700 mb-6">Please review this task and take appropriate action.</p>
            
            <!-- Action Button -->
            <div class="text-center mb-6">
                <a href="{{ url('/tasks/' . $task->id) }}" 
                   class="inline-block px-5 py-3 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition duration-150 ease-in-out">
                   View Task
                </a>
            </div>
            
            <p class="text-gray-700">
                Thank you,<br>
                {{ config('app.name') }} Team
            </p>
        </div>
        
        <!-- Footer -->
        <div class="border-t border-gray-200 px-6 py-4">
            <p class="text-gray-500 text-sm text-center">
                This is an automated message. Please do not reply to this email.
            </p>
        </div>
    </div>
</body>
</html>