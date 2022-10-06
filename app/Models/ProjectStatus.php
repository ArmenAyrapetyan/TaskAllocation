<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 1;
    const STATUS_COMPLETE = 2;
    const STATUS_DRAFT = 3;

    public function projects()
    {
        return $this->hasMany(Project::class, 'status_id');
    }
}
