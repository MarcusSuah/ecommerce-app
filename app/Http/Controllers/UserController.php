<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        // Validate and store the user data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Store the user in the database
        // User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    public function show($id)
    {
        // Retrieve the user from the database
        // $user = User::findOrFail($id);

        return view('show', compact('user'));
    }
    public function edit($id)
    {
        // Retrieve the user from the database
        // $user = User::findOrFail($id);

        return view('edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Validate and update the user data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update the user in the database
        // User::where('id', $id)->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    public function destroy($id)
    {
        // Delete the user from the database
        // User::destroy($id);

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
