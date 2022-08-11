<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use App\Models\TaskRole;
use App\Models\TaskStatus;
use App\Models\TaskUser;
use Livewire\Component;

class Detail extends Component
{
    public $task;
    public $task_id;

    public function mount($id)
    {
        $this->task_id = $id;
        $this->task = Task::find($id);
    }

    protected $listeners = [
        'refreshTaskInfo'
    ];

    public function refreshTaskInfo()
    {
        $this->task = Task::find($this->task_id);
    }

    public function modStatus($isModDesc)
    {
        if ($isModDesc) {
            if ($this->task->status_id != TaskStatus::STATUS_MODIFICATION)
                $this->task->status_id = TaskStatus::STATUS_MODIFICATION;
        } else {
            if ($this->task->status_id != TaskStatus::STATUS_WORKPROCCESS)
                $this->task->status_id = TaskStatus::STATUS_WORKPROCCESS;
        }
        $this->task->save();
        $this->refreshTaskInfo();
    }

    public function takeExecutor()
    {
        if ($this->task->status_id == TaskStatus::STATUS_NEW) {
            $this->task->status_id = TaskStatus::STATUS_WORKPROCCESS;
            $this->task->save();
        }
        TaskUser::create([
            'task_id' => $this->task_id,
            'user_id' => auth()->id(),
            'task_role_id' => TaskRole::ROLE_EXECUTOR,
        ]);
        $this->refreshTaskInfo();
    }

    public function render()
    {
        return view('livewire.task.detail');
    }
}
