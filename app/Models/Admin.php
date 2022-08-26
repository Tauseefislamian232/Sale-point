<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory, Notifiable;
    protected $guarded = [];  
    
    protected $fillables = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'is_admin',
        'status',
    ];
}