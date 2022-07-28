<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }

    public function group()
    {
        return $this->belongsTo(SpecialGroup::class, 'special_group_id', 'id');
    }

    public function counterparty()
    {
        return $this->belongsToMany(Counterparty::class, 'counterparty_contacts');
    }
}
