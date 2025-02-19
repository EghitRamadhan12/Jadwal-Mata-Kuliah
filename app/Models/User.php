<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class user extends AuthUser 
{
    use HasFactory, Notifiable, HasUuids, HasApiTokens;

    protected $table = 'users';
    protected $fillable = [
        'id',
        'email',
        'password',
        'role'
    ];
}
