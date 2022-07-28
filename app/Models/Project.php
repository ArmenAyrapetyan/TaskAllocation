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

    public function getInfo(): Attribute
    {
        $info = [];
        $counterpartyName = "Нет контрагента";
        if ($this->counterparty) {
            $counterpartyName = $this->counterparty->name;
        }

        $taskInfo = [];

        foreach ($this->tasks as $task) {
            $users = [];
            foreach ($task->users as $user){
                $users[] = [
                  'user_name' => $user->user->full_name,
                  'user_role' => $user->role->name,
                ];
            }
            $time_spend = "0 мин.";
            if ($this->time_spend) {
                $time_spend = $this->time_spend;
            }
            $taskInfo[] = [
                'task_name' => $task->name,
                'task_status' => $task->status->name,
                'task_date_create' => date("d-m-Y", strtotime($task->created_at)),
                'task_time_spend' => $time_spend,
                'task_users' => $users,
            ];
        }

        $info = [
            'project_name' => $this->name,
            'counterparty_name' => $counterpartyName,
            'tasks' => $taskInfo
        ];

        return Attribute::make(
            get: fn($value) => $info,
        );
    }

    public function countTasks(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->tasks()->count(),
        );
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
