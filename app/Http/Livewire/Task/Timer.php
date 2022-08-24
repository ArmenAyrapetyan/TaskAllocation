<?php

namespace App\Http\Livewire\Task;

use App\Models\AccessUser;
use App\Models\Task;
use App\Models\TimeSpend;
use Livewire\Component;

class Timer extends Component
{
    public $task;
    public $task_id;
    public $time_start;
    public $message;

    protected $rules = [
        'task_id' => 'required'
    ];

    public function mount()
    {
        if (session()->has(['time_start', 'message', 'task_id'])){
            $this->time_start = session()->get('time_start');
            $this->task_id = session()->get('task_id');
            $this->message = session()->get('message');
        } else {
            $this->time_start = null;
        }
    }

    public function timerGoAndStop()
    {
        $this->validate();
        if (!$this->time_start) {
            $this->time_start = time();
            session()->put('time_start', $this->time_start);
            session()->put('message', $this->message);
            session()->put('task_id', $this->task_id);
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
                    'message' => $this->task->name . ' - ' . $this->message,
                    'time_spend' => time() - $this->time_start,
                ]);
            }
        }
        session()->forget(['time_start', 'message', 'task_id']);
    }

    public function render()
    {
        return view('livewire.task.timer');
    }
}
