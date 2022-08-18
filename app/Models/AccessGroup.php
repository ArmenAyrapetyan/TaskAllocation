<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'role_id',
        'accessable_id',
        'accessable_type',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(AccessRole::class, 'role_id', 'id');
    }
}
