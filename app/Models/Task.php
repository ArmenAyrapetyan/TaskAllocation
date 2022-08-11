<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Task extends AllAccess
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'project_id',
        'status_id',
        'time_planned',
        'date_start',
        'date_end',
    ];

    public function creatorId(): Attribute
    {
        $id = 0;
        foreach ($this->users as $user) {
            if ($user->role->id == TaskRole::ROLE_CREATOR) {
                $id = $user->user->id;
            }
        }
        return Attribute::make(
            get: fn($value) => $id
        );
    }

    public function auditId(): Attribute
    {
        $id = 0;
        foreach ($this->users as $user) {
            if ($user->role->id == TaskRole::ROLE_AUDIT) {
                $id = $user->user->id;
            }
        }
        return Attribute::make(
            get: fn($value) => $id
        );
    }

    public function isUserInTask($id)
    {
        foreach ($this->users as $user) {
            if ($user->user->id == $id) {
                return true;
            }
        }
        return false;
    }

    public function timeSpend()
    {
        $sumTime = 0;
        $arrTime = DB::table('task_users')->where('task_id', $this->id)->pluck('time_spend')->toArray();
        for ($i = 0; $i < count($arrTime); $i++){
            $sumTime += $arrTime[$i];
        }
        return $sumTime;
    }

    public function curUser($id)
    {
        foreach ($this->users as $user) {
            if ($user->user->id == $id) {
                return $user;
            }
        }
        return null;
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
