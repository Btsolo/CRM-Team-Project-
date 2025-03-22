<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Project Created</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Header -->
        <div class="bg-purple-600 px-6 py-4">
            <h1 class="text-white text-xl font-bold text-center">New Project Created</h1>
        </div>
        
        <!-- Content -->
        <div class="p-6">
            <p class="text-gray-700 mb-4">Hello {{ $customer->name }},</p>
            
            <p class="text-gray-700 mb-4">A new project has been created for you by {{ $createdBy->name }}.</p>
            
            <!-- Project Details Card -->
            <div class="bg-gray-50 rounded-lg p-5 border border-gray-200 mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $project->name }}</h2>
                <div class="space-y-2">
                    <p class="text-gray-700"><span class="font-medium">Description:</span> {{ $project->description }}</p>
                    <p class="text-gray-700"><span class="font-medium">Start Date:</span> {{ date('F j, Y', strtotime($project->start_date)) }}</p>
                    
                    @if($project->end_date)
                    <p class="text-gray-700"><span class="font-medium">End Date:</span> {{ date('F j, Y', strtotime($project->end_date)) }}</p>
                    @endif
                    
                    <p class="text-gray-700"><span class="font-medium">Budget:</span> ${{ number_format($project->budget, 2) }}</p>
                    
                    <p class="text-gray-700"><span class="font-medium">Status:</span> 
                        <span class="
                            @if($project->status == 'active') text-green-600 
                            @elseif($project->status == 'pending') text-yellow-600 
                            @elseif($project->status == 'completed') text-blue-600
                            @else text-gray-600 
                            @endif
                            font-medium
                        ">
                            {{ ucfirst($project->status) }}
                        </span>
                    </p>
                    
                    <p class="text-gray-700"><span class="font-medium">Priority:</span> 
                        <span class="
                            @if($project->priority == 'high') text-red-600 
                            @elseif($project->priority == 'medium') text-yellow-600 
                            @else text-green-600 
                            @endif
                            font-medium
                        ">
                            {{ ucfirst($project->priority) }}
                        </span>
                    </p>
                    
                    @if($project->notes)
                    <p class="text-gray-700"><span class="font-medium">Additional Notes:</span> {{ $project->notes }}</p>
                    @endif
                </div>
            </div>
            
            <p class="text-gray-700 mb-6">We'll keep you updated on the progress of this project.</p>
            
            <!-- Action Button -->
            <div class="text-center mb-6">
                <a href="{{ url('/projects/' . $project->id) }}" 
                   class="inline-block px-5 py-3 bg-purple-600 text-white font-medium rounded-md hover:bg-purple-700 transition duration-150 ease-in-out">
                   View Project Details
                </a>
            </div>
            
            <p class="text-gray-700">
                Thank you for your business,<br>
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