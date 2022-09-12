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
    ];

    public function projectAccessable()
    {
        return $this->morphTo();
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function counterparty()
    {
        return $this->belongsTo(Counterparty::class, 'counterparty_id', 'id');
    }
}
