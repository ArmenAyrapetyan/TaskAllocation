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
        return Attribute::make(
            get: fn($value) => $this->users->where('pivot.role_id', AccessRole::ROLE_CREATOR)->first()->pivot->user_id
        );
    }

    public function auditId(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->users->where('pivot.role_id', AccessRole::ROLE_AUDIT)->first()->pivot->user_id
        );
    }

    public function isUserInTask($id)
    {
        if(in_array($id, $this->users->pluck('id')->toArray()))
            return true;
        return false;
    }

    public function timeSpend()
    {
        $sumTime = 0;
        for ($i = 0; $i < count($this->users->pluck('pivot.time_spend')); $i++){
            $sumTime += $this->users->pluck('pivot.time_spend')[$i];
        }
        return $sumTime;
    }

    public function curUser($id)
    {
        return $this->morphToMany(User::class, 'accessable', 'access_users')
            ->where('user_id', $id)
            ->withPivot('role_id', 'time_spend');
    }

    public function users()
    {
        return $this->morphToMany(User::class, 'accessable', 'access_users')
            ->withPivot('role_id', 'time_spend');
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
