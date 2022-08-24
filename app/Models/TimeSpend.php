<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSpend extends Model
{
    use HasFactory;

    protected $fillable = [
        'access_user_id',
        'message',
        'time_spend'
    ];

    public function userAccess()
    {
        return $this->belongsTo(AccessUser::class, 'access_user_id', 'id');
    }
}
