<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function getDetails(): Attribute
    {
        $info = [];

        $projectName = "Без проекта";
        if ($this->project) {
            $projectName = $this->project->name;
        }

        $taskInfo = [];

        $creator = [];

        foreach ($this->users as $user) {
            $image_path = "storage/images/imguser.png";
            if ($user->user->avatar) {
                $image_path = $user->user->avatar;
            }
            if ($user->role->id == 1) {
                $creator = [
                    'creator_avatar' => $image_path,
                    'creator_name' => $user->user->full_name,
                    'creator_role' => $user->role->name,
                ];
            }
        }

        $messages = [];
        foreach ($this->messages as $message) {
            $image_path = "storage/images/imguser.png";
            if ($message->user->avatar) {
                $image_path = $message->user->avatar;
            }

            $user = [
                'user_name' => $message->user->full_name,
                'avatar' => $image_path,
            ];

            $messages[] = [
                'text' => $message->text,
                'date_create' => date("d-m-Y", strtotime($message->created_at)),
                'user' => $user,
            ];
        }

        $time_spend = "0 мин.";
        if ($this->time_spend) {
            $time_spend = $this->time_spend;
        }

        $taskInfo = [
            'task_name' => $projectName . '-' . $this->name,
            'task_description' => $this->description,
            'task_date_create' => date("d-m-Y", strtotime($this->created_at)),
            'task_time_spend' => $time_spend,
            'task_creator' => $creator,
            'task_messages' => $messages,
        ];

        return Attribute::make(
            get: fn($value) => $taskInfo,
        );
    }

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
