<?php

namespace App\Http\Livewire\Task;

use App\Models\AccessUser;
use App\Models\ActiveTimers;
use App\Models\Task;
use App\Models\TimeSpend;
use Livewire\Component;

class Timer extends Component
{
    public $task;
    public $task_id;
    public $time_start;
    public $message;
    public $active_timer;

    protected $rules = [
        'task_id' => 'required'
    ];

    public function mount()
    {
        $user = auth()->user();
        if ($user->activeTimer){
            $this->active_timer = $user->activeTimer;
            $this->time_start = $user->activeTimer->time_start;
            $this->task_id = $user->activeTimer->task_id;
            $this->message = $user->activeTimer->message;
        } else {
            $this->time_start = null;
        }
    }

    public function timerGoAndStop()
    {
        $this->validate();
        if (!$this->time_start) {
            $this->time_start = time();
            $this->active_timer = ActiveTimers::create([
                'user_id' => auth()->id(),
                'task_id' => $this->task_id,
                'time_start' => $this->time_start,
                'message' => $this->message ? : "Без сообщения",
            ]);
        } else {
            $this->pushTime();
            $this->time_start = null;
        }
    }

    public function pushTime()
    {
        if ($this->time_start) {
            $this->task = Task::find($this->task_id);
            $user_time = AccessUser::where('user_id', auth()->id())
                ->where('accessable_type', Task::class)->where('accessable_id', $this->task->id)->first();
            if ($user_time) {
                TimeSpend::create([
                    'access_user_id' => $user_time->id,
                    'message' => $this->message ? : $this->task->name,
                    'time_spend' => time() - $this->time_start,
                ]);
            }
        }
        $this->active_timer->delete();
    }

    public function render()
    {
        return view('livewire.task.timer');
    }
}
