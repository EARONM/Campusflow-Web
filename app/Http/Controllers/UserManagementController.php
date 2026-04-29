<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
            'campus' => 'nullable'
        ]);

        if (
            auth()->user()->role === 'CampusAdmin' &&
            in_array($request->role, ['SuperAdmin', 'CampusAdmin'])
        ) {
            abort(403);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'campus' => $request->campus,
        ]);

        return back()->with('success', 'User created');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
            'campus' => 'nullable',
        ]);

        if (
            auth()->user()->role === 'CampusAdmin' &&
            in_array($request->role, ['CampusAdmin', 'SuperAdmin'])
        ) {
            abort(403);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'campus' => $request->campus,
        ]);

        return redirect()->route('users')
            ->with('success', 'User updated successfully.');
    }
}
