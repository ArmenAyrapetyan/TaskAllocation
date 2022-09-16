<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGroup extends Model
{
    use HasFactory;

    const GROUP_TRANSACT = 1;
    const GROUP_DEVELOP = 2;
    const GROUP_AD = 3;
    const GROUP_DOCUMENTS = 4;
    const GROUP_AMADO = 5;
    const GROUP_ARCHIVE = 6;
    const GROUP_BASE = 7;

    public function countProject(): Attribute
    {
        return Attribute::make(
          get: fn ($value) => $this->projects()->count()
        );
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'group_id');
    }
}
