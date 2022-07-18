<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counterparty extends AllAccess
{
    use HasFactory;

    public function projects()
    {
        return $this->hasMany(Project::class, 'counterparty_id');
    }

    public function group()
    {
        return $this->belongsTo(SpecialGroup::class, 'special_group_id', 'id');
    }

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }

    public function contacts()
    {
        return $this->hasMany(CounterpartyContact::class, 'counterparty_id');
    }
}
