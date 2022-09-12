<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDictionary extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'dictionary_id',
    ];

    public function dictionary()
    {
        return $this->belongsTo(Dictionary::class, 'dictionary_id', 'id');
    }

    public function projectInformation()
    {
        return $this->morphMany(ProjectAccesses::class, 'dictionariable');
    }
}
