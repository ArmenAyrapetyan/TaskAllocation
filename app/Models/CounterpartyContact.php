<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounterpartyContact extends Model
{
    use HasFactory;

    public function counterparty()
    {
        return $this->belongsTo(Counterparty::class, 'counterparty_id', 'id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }
}
