<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        // Add any other fields you may have, e.g., 'role_id' if applicable
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Define the relationship to the Role model
    public function role()
    {
        return $this->belongsTo(Role::class); // Assuming users have a role_id field
    }

    // Optionally, you can add a method to check roles
    public function hasRole($role)
    {
        return $this->role()->where('name', $role)->exists();
    }
}