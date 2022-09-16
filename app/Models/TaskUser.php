<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    use HasFactory;

    protected $fillable = [
      'task_id',
      'user_id',
      'time_spend',
      'task_role_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(TaskRole::class, 'task_role_id', 'id');
    }
}
