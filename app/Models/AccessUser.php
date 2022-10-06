<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role_id',
        'accessable_id',
        'accessable_type',
    ];

    public function toAll()
    {
        return $this->morphTo('accessable');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(AccessRole::class, 'role_id', 'id');
    }

    public function times()
    {
        return $this->hasMany(TimeSpend::class, 'access_user_id', 'id');
    }
}
