<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends AllAccess
{
    use HasFactory;

    protected $fillable = [
      'name',
      'description',
      'project_id',
      'status_id',
      'time_planned',
      'time_spend',
      'date_start',
      'date_end',
    ];

    public function users()
    {
        return $this->hasMany(TaskUser::class, 'task_id');
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(Messages::class, 'task_id');
    }
}
