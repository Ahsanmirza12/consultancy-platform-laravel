<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // Show form to create a new user
    public function create()
    {
        return view('users.add-users');
    }

    // Store new user
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => $request->role,
        ]);

        return redirect()->back()->with('success', 'User added successfully!');
    }

    // Show form to edit existing user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit-users', compact('user'));
    }

    // Update user info
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:user,admin',
        ]);

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->role       = $request->role;

        // Optional: Update password only if filled
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'min:6|confirmed'
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }
}
