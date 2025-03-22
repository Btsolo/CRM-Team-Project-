<!DOCTYPE html>
<html>
<head>
    <title>Task Update</title>
</head>
<body>
    <h2>Task Update: {{ ucfirst($task->status) }}</h2>
    <p>Hello {{ $task->assignedToUser->name }},</p>
    <p>The task <strong>{{ $task->title }}</strong> has been marked as <strong>{{ $task->status }}</strong>.</p>
    <p>Description: {{ $task->description }}</p>
    <p>Thank you,</p>
    <p>Team</p>
</body>
</html>
