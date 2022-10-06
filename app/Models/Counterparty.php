<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Counterparty extends AllAccess
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'website_url',
        'vk_url',
        'telegram',
        'is_manufacturer',
        'special_group_id',
        'source_id',
    ];

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
        return $this->belongsToMany(Contact::class, 'counterparty_contacts');
    }
}
