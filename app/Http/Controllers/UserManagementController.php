<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Campus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::with(['role', 'campus'])->latest()->get();

        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role_id' => 'required',
            'campus_id' => 'nullable',
        ]);

        $loggedUser = auth()->user();
        $selectedRole = Role::find($request->role_id);

        if (
            $loggedUser->role &&
            $loggedUser->role->name === 'CampusAdmin' &&
            in_array($selectedRole->name, ['SuperAdmin', 'CampusAdmin'])
        ) {
            abort(403);
        }

        User::create([
            'name'      => $request->name,
            'username' => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role_id'   => $request->role_id,
            'campus_id' => $request->campus_id,
        ]);

        return back()->with('success', 'User created');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $campuses = Campus::all();

        return view('users.edit', compact('user', 'roles', 'campuses'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'role_id'   => 'required|exists:roles,id',
            'campus_id' => 'nullable|exists:campuses,id',
        ]);

        $loggedUser = auth()->user();
        $selectedRole = Role::find($request->role_id);

        if (
            $loggedUser->role &&
            $loggedUser->role->name === 'CampusAdmin' &&
            in_array($selectedRole->name, ['SuperAdmin', 'CampusAdmin'])
        ) {
            abort(403);
        }

        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'role_id'   => $request->role_id,
            'campus_id' => $request->campus_id,
        ]);

        return redirect()
            ->route('users')
            ->with('success', 'User updated successfully.');
    }
}