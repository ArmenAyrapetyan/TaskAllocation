<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllAccess extends Model
{
    public function accessUsers()
    {
        return $this->morphMany(AccessUser::class, 'accessable');
    }

    public function accessGroups()
    {
        return $this->morphMany(AccessGroup::class, 'accessable');
    }
}
