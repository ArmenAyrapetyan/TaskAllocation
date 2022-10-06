<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'post',
        'source_id',
        'special_group_id',
        'user_id',
        'phone',
        'email',
        'telegram',
        'vk_url',
        'counterparty_id',
    ];

    public function fullName() : Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->first_name . ' ' . $this->last_name
        );
    }

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
        return $this->belongsTo(Counterparty::class, 'counterparty_id', 'id');
    }
}
