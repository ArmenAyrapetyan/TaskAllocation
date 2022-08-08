<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskRole extends Model
{
    use HasFactory;

    const ROLE_CREATOR = 1;
    const ROLE_AUDIT = 2;
    const ROLE_EXECUTOR = 3;
}
