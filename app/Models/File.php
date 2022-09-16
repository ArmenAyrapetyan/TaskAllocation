<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
      'path',
      'fileable_id',
      'fileable_type',
      'is_avatar',
    ];

    use HasFactory;
}
