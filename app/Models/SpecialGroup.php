<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialGroup extends Model
{
    use HasFactory;

    const SPECGROUP_CLIENT = 1;
    const SPECGROUP_COMPETITOR = 2;
    const SPECGROUP_PARTNER = 3;
}
