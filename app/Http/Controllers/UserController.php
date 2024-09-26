<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $this->authorizeAdmin();

        $users = User::with('role')->get(); // Get users with roles
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $this->authorizeAdmin();

        $roles = Role::all(); // Get all roles
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->role()->associate($request->role_id);
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $this->authorizeAdmin();

        $roles = Role::all(); // Get all roles
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorizeAdmin();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update($request->only(['name', 'email']));
        $user->role()->associate($request->role_id);
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $this->authorizeAdmin();

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    private function authorizeAdmin()
    {
        if (Auth::check() && Auth::user()->role->name !== 'Admin') {
            return redirect('/')->with('error', 'Unauthorized access.'); // Redirect if not Admin
        }
    }
}