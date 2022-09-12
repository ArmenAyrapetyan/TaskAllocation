<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];

    public function subDictionaries()
    {
        return $this->hasMany(SubDictionary::class, 'dictionary_id', 'id');
    }

    public function projectInformation()
    {
        return $this->morphMany(ProjectAccesses::class, 'dictionariable');
    }
}
