<?php

namespace App\Http\Livewire\Main;

use App\Models\Task;
use App\Models\TaskRole;
use App\Models\TaskStatus;
use Livewire\Component;

class Show extends Component
{
    public $new_tasks;
    public $active_tasks;
    public $audit_tasks;

    public function mount()
    {
        $this->new_tasks = Task::where('status_id', TaskStatus::STATUS_NEW)->get();
        $active_tasks = auth()->user()->tasks;
        foreach ($active_tasks as $key => $task){
            if ($task->status_id == TaskStatus::STATUS_CANCELLED) $active_tasks->forget($key);
            if ($task->status_id == TaskStatus::STATUS_DONE) $active_tasks->forget($key);
            if ($task->status_id == TaskStatus::STATUS_COMPLETED) $active_tasks->forget($key);
        }
        $this->active_tasks = $active_tasks;
        $audit_tasks = Task::where('status_id', '!=', TaskStatus::STATUS_DONE)
            ->where('status_id', '!=', TaskStatus::STATUS_CANCELLED)
            ->where('status_id', '!=', TaskStatus::STATUS_COMPLETED)
            ->get();
        foreach ($audit_tasks as $key => $task){
            if ($task->audit_id != auth()->id()){
                $audit_tasks->forget($key);
            }
        }
        $this->audit_tasks = $audit_tasks;
    }

    public function render()
    {
        return view('livewire.main.show');
    }
}
