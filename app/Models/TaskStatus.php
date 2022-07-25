<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    use HasFactory;

    const STATUS_NEW = 1;
    const STATUS_WORKPROCCESS = 2;
    const STATUS_DONE = 3;
    const STATUS_COMPLETED = 4;
    const STATUS_WAITINGRESPONSE = 5;
    const STATUS_PENDING = 1;
    const STATUS_CANCELLED = 1;
    const STATUS_MODIFICATION = 1;
}
