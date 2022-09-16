<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    const SOURCE_WEBSITE = 1;
    const SOURCE_PHONE = 2;
    const SOURCE_EMAIL = 3;
    const SOURCE_WEBINAR = 4;
    const SOURCE_SOCIALNET = 5;
    const SOURCE_RECOMEND = 6;
}
