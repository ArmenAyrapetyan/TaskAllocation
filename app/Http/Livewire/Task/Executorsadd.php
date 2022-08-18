<?php

namespace App\Http\Livewire\Task;

use App\Models\AccessRole;
use App\Models\Group;
use App\Models\Task;
use App\Models\TaskUser;
use App\Models\User;
use Livewire\Component;

class Executorsadd extends Component
{
    public $task;
    public $users;
    public $groups;
    public $whatRoleCreate;

    public function exectAddOrDel($user_id)
    {

        $this->emit('refreshMessages');
    }

    public function refreshEmployeeInfo()
    {
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshTaskInfo');
    }

    public function mount($task_id)
    {
        $this->task = Task::find($task_id);
        $this->users = User::all();
        $this->groups = Group::all();
    }

    public function render()
    {
        return view('livewire.task.executorsadd');
    }
}
