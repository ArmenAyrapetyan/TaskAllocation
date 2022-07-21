<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGroup extends Model
{
    use HasFactory;

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
