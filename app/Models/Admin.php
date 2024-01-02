<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\AdminFactory;

class Admin extends Model
{
    use HasApiTokens, HasFactory;

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
