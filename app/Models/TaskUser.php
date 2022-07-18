<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    use HasFactory;

    public function getUsers()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function getTask()
    {
        return $this->hasOne(Task::class, 'task_id');
    }

    //TODO уточнить это
    public function getRole()
    {
        return $this->belongsTo(TaskRole::class, 'role_id', 'id');
    }
}
