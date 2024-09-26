<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all(); // Fetch all roles
        return view('roles.index', compact('roles')); // Return view with roles
    }

    public function create()
    {
        return view('roles.create'); // Return create role view
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:roles,name']); // Validate request
        Role::create($request->only('name')); // Create new role
        return redirect()->route('roles.index')->with('success', 'Role created successfully'); // Redirect with success message
    }

    // Additional methods for edit, update, and delete can be added similarly

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role')); // Return edit view with the role
    }

    public function update(Request $request, Role $role)
    {
        $request->validate(['name' => 'required|unique:roles,name,' . $role->id]); // Validate request
        $role->update($request->only('name')); // Update the role
        return redirect()->route('roles.index')->with('success', 'Role updated successfully'); // Redirect with success message
    }

    public function destroy(Role $role)
    {
        $role->delete(); // Delete the role
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully'); // Redirect with success message
    }
}