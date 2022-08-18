<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'time_spend',
        'role_id',
        'accessable_id',
        'accessable_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(AccessRole::class, 'role_id', 'id');
    }
}
