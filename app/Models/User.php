<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'third_name',
        'rate_per_hour',
        'system_role_id',
        'telegram',
        'vk_url',
        'phone',
        'password',
        'email',
    ];

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->first_name . ' ' . $this->last_name
        );
    }

    public function systemRole()
    {
        return $this->belongsTo(SystemRole::class, 'system_role_id', 'id');
    }

    public function projects()
    {
        return $this->morphedByMany(Project::class, 'accessable', 'access_users');
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'user_id');
    }

    public function messages()
    {
        return $this->hasMany(Messages::class, 'user_id');
    }

    public function tasks()
    {
        return $this->morphedByMany(Task::class, 'accessable', 'access_users');
    }

    public function avatar()
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'user_groups');
    }

    public function auditableTasks()
    {
        return $this->morphedByMany(Task::class, 'accessable', 'access_users')
            ->withPivot('role_id')
            ->wherePivot('role_id', AccessRole::ROLE_AUDIT)
            ->whereNotIn('status_id', [
                TaskStatus::STATUS_COMPLETED,
                TaskStatus::STATUS_DONE,
                TaskStatus::STATUS_CANCELLED,
            ])->get();
    }

    public function activeTasks()
    {
        return $this->morphedByMany(Task::class, 'accessable', 'access_users')
            ->withPivot('role_id')
            ->wherePivotIn('role_id', [AccessRole::ROLE_EXECUTOR, AccessRole::ROLE_CREATOR])
            ->whereNotIn('status_id', [
                TaskStatus::STATUS_COMPLETED,
                TaskStatus::STATUS_DONE,
                TaskStatus::STATUS_CANCELLED,
            ])->get();
    }

    public function getRoleName($id)
    {
        return AccessRole::find($id)->name;
    }
}
