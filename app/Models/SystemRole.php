<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemRole extends Model
{
    use HasFactory;

    const SYSROLE_ADMIN = 1;
    const SYSROLE_USER = 2;
}
