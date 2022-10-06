<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAccesses extends Model
{
    use HasFactory;

    protected $fillable = [
        'information',
        'dictionariable_type',
        'dictionariable_id',
        'objectable_type',
        'objectable_id',
    ];

    public function dictionary()
    {
        return $this->morphTo('dictionariable');
    }

    public function object()
    {
        return $this->morphTo('objectable');
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
