<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends AllAccess
{
    use HasFactory;

    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id');
    }

    public function group()
    {
        return $this->belongsTo(ProjectGroup::class, 'group_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(ProjectStatus::class, 'status_id', 'id');
    }

    public function counterparty()
    {
        return $this->belongsTo(Counterparty::class, 'counterparty_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
