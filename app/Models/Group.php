<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    const GROUP_SEO = 1;
    const GROUP_BACKOFFICE = 2;
    const GROUP_MARCKETPR = 3;
    const GROUP_DESIGNHEAD = 4;
    const GROUP_CONTENTHEAD = 5;
    const GROUP_SALEHEAD = 6;
    const GROUP_PROGRAMMERS = 7;
    const GROUP_AD = 8;
    const GROUP_SERVICE = 9;
    const GROUP_TARGET = 10;
    const GROUP_MANAGE = 11;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_groups');
    }

    public function access()
    {
        return $this->hasOne(AccessGroup::class, 'group_id');
    }
}
