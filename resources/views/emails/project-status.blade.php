<!DOCTYPE html>
<html>
<head>
    <title>Project Update</title>
</head>
<body>
    <h2>Project Update: {{ ucfirst($project->status) }}</h2>
    <p>Hello {{ $project->manager->name }},</p>
    <p>The project <strong>{{ $project->name }}</strong> has been marked as <strong>{{ $project->status }}</strong>.</p>
    <p>Description: {{ $project->description }}</p>
    <p>Thank you,</p>
    <p>Team</p>
</body>
</html>
