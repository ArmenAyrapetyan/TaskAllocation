<?php

namespace App\Http\Livewire\Task;

use App\Models\AccessRole;
use App\Models\AccessUser;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\TaskUser;
use App\Services\Notifications;
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
        Notifications::sendTaskNotify(auth()->id(), $this->task_id, 'Изменен статус');
        $this->task->save();
        $this->refreshTaskInfo();
    }

    public function takeExecutor()
    {
        if ($this->task->status_id == TaskStatus::STATUS_NEW) {
            $this->task->status_id = TaskStatus::STATUS_WORKPROCCESS;
            $this->task->save();
        }
        AccessUser::create([
            'user_id' => auth()->id(),
            'role_id' => AccessRole::ROLE_EXECUTOR,
            'accessable_id' => $this->task->id,
            'accessable_type' => Task::class,
        ]);
        $this->refreshTaskInfo();
        $this->emit('refreshMessages');
    }

    public function render()
    {
        return view('livewire.task.detail');
    }
}
