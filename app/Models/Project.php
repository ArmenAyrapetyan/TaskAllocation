<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends AllAccess
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'counterparty_id',
        'group_id',
        'status_id',
    ];

    public function countTasks(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->tasks()->count(),
        );
    }

    public function time()
    {
        $time_planned = 0;
        $time_spend = 0;

        foreach ($this->tasks as $task){
            $time_planned += $task->time_planned;
            $time_spend += $task->timeSpend();
        }

        return array($time_planned, $time_spend);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

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

    public function users()
    {
        return $this->morphToMany(User::class, 'accessable', 'access_users');
    }
}
