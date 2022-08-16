<?php

namespace App\Services;

use App\Models\Task;
use App\Notifications\TaskNotify;
use Illuminate\Support\Facades\Notification;

class Notifications
{
    public static function sendTaskNotify($user_id, $task_id, $message)
    {
        $task = Task::find($task_id);

        foreach ($task->users as $user) {
            if (auth()->id() != $user->id) {
                Notification::send($user->user, new TaskNotify([
                    'user_id' => $user_id,
                    'task_id' => $task_id,
                    'message' => $message
                ]));
            }
        }
    }
}
