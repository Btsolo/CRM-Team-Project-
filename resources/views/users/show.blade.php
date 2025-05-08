<!-- filepath: c:\Users\User\Documents\TEAM PROJECT\Project\resources\views\users\show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-6">
        <a href="{{ route('users.index') }}" class="text-blue-600 hover:text-blue-800">
            &larr; Back to Users
        </a>
    </div>
    <h1 class="text-2xl font-bold mb-4">User Details</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <p><strong>First Name:</strong> {{ $user->first_name }}</p>
        <p><strong>Last Name:</strong> {{ $user->last_name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Phone Number:</strong> {{ $user->phone_number }}</p>
        <p><strong>Role:</strong> {{ $user->role_id }}</p>
    </div>
   
</div>
@endsection