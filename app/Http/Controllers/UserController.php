<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $columns  = ['first_name', 'last_name', 'email','role_id'];
        $users = User::latest()->paginate(15);

        return view('users.index', compact('users','columns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',	
            'role_id' => 'required|integer|exists:roles,id',
        ]);
    
        // Hash the password before saving
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        // Create the user
        User::create($validatedData);
    
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }
    public function show(User $user)
{
    return view('users.show', compact('user'));
}

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'role_id' => 'required|integer|exists:roles,id',
        ]);
    
        $user->update($validatedData);
    
        return redirect()->route('users.index')->with('success', 'User role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
    
}
