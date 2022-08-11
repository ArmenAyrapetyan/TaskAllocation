<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use App\Models\TaskRole;
use App\Models\TaskUser;
use App\Models\User;
use Livewire\Component;

class Executorsadd extends Component
{
    public $task;
    public $users;

    public function exectAddOrDel($user_id)
    {
        if (!$this->task->isUserInTask($user_id)) {
            TaskUser::create([
                'task_id' => $this->task->id,
                'user_id' => $user_id,
                'task_role_id' => TaskRole::ROLE_EXECUTOR,
            ]);
        } else {
            TaskUser::where('user_id', $user_id)
                ->where('task_id', $this->task->id)
                ->delete();
        }
    }

    public function refreshEmployeeInfo()
    {
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshTaskInfo');
    }

    public function mount($task_id)
    {
        $this->task = Task::find($task_id);

        $this->users = User::whereNotIn('id', [$this->task->creator_id])->get();
    }

    public function render()
    {
        return view('livewire.task.executorsadd');
    }
}
