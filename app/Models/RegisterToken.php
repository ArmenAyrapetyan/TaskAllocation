<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'isActive',
        'rate_per_hour',
    ];
}
