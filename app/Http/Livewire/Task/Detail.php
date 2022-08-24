<?php

namespace App\Http\Livewire\Task;

use App\Models\AccessRole;
use App\Models\AccessUser;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Services\Notifications;
use Livewire\Component;

class Detail extends Component
{
    public $task;
    public $task_id;
    public $status_id;
    public $statuses;

    public function mount($id)
    {
        $this->task_id = $id;
        $this->statuses = TaskStatus::select('id', 'name')->get();
        $this->task = Task::find($id);
        $this->status_id = $this->task->status_id;
    }

    protected $listeners = [
        'refreshTaskInfo'
    ];

    public function refreshTaskInfo()
    {
        $this->task = Task::find($this->task_id);
    }

    public function modStatus()
    {
        $this->task->status_id = $this->status_id;
        $message = 'У задачи ' . $this->task->name . ' был обновлен статус на ' . $this->task->status->name;
        Notifications::sendTaskNotify(auth()->id(), $this->task->id, $message);
        $this->task->save();
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
        $message = 'Добавился исполнитель';
        Notifications::sendTaskNotify(auth()->id(), $this->task->id, $message);
        $this->refreshTaskInfo();
        $this->emit('refreshMessages');
    }

    public function render()
    {
        return view('livewire.task.detail');
    }
}
