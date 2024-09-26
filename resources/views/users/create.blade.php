@extends('layouts.app')

@section('content')
    <h1>Add User</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="role_id">Role:</label>
        <select name="role_id" required>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>

        <button type="submit">Add User</button>
    </form>
@endsection
