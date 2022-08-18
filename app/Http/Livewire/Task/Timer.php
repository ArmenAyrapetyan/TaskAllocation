<?php

namespace App\Http\Livewire\Task;

use App\Models\AccessUser;
use App\Models\Task;
use Livewire\Component;

class Timer extends Component
{
    public $time;
    public $time_passed;
    public $isTimerActive;
    public $isTimerFirstGo;
    public $task;

    public function mount($task_id)
    {
        $this->time_passed = null;
        $this->isTimerActive = false;
        $this->isTimerFirstGo = false;
        $this->task = Task::find($task_id);
    }

    public function pushTime($user_id)
    {
        if ($this->time_passed) {
            $user_time = AccessUser::where('user_id', auth()->id())->where('accessable_type', Task::class)->where('accessable_id', $this->task->id)->first();
            if ($user_time) {
                $user_time->time_spend += round($this->time_passed / 60);
                $user_time->save();
            }
        }
        $this->time_passed = 0;
        $this->emit('refreshTaskInfo');
    }

    public function goTimerActive()
    {
        if (!$this->isTimerFirstGo) {
            $this->isTimerFirstGo = true;
            $this->time = time();
        }

        $this->isTimerActive
            ? $this->isTimerActive = false
            : $this->isTimerActive = true;
    }

    public function render()
    {
        if ($this->isTimerActive) {
            $this->time_passed = time() - $this->time;
        }
        return view('livewire.task.timer');
    }
}
