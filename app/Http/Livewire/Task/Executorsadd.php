<?php

namespace App\Http\Livewire\Task;

use App\Models\AccessGroup;
use App\Models\AccessRole;
use App\Models\AccessUser;
use App\Models\Group;
use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Executorsadd extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $task;
    public $task_id;
    public $groups;

    public function mount($task_id)
    {
        $this->task_id = $task_id;
        $this->refreshInfo();
    }

    public function addGroupAsExecutor($group_id)
    {
        AccessGroup::create([
            'group_id' => $group_id,
            'role_id' => AccessRole::ROLE_EXECUTOR,
            'accessable_id' => $this->task->id,
            'accessable_type' => Task::class,
        ]);
        $this->refreshInfo();
    }

    public function addExecutor($user_id)
    {
        $this->saveAccess($user_id, AccessRole::ROLE_EXECUTOR);
    }

    public function addCreator($user_id)
    {
        $this->saveAccess($user_id, AccessRole::ROLE_CREATOR);
    }

    public function addAudit($user_id)
    {
        $this->saveAccess($user_id, AccessRole::ROLE_AUDIT);
    }

    public function saveAccess($user_id, $role_id)
    {
        $relationUserTask = AccessUser::where('user_id', $user_id)->where('accessable_id', $this->task->id)
            ->where('accessable_type', Task::class)->first();
        if (!$relationUserTask){
            AccessUser::create([
                'user_id' => $user_id,
                'role_id' => $role_id,
                'accessable_id' => $this->task->id,
                'accessable_type' => Task::class,
            ]);
        } else if ($relationUserTask->role_id > $role_id){
            $relationUserTask->role_id = $role_id;
            $relationUserTask->save();
        }
        $this->refreshInfo();
    }

    public function refreshInfo()
    {
        $this->task = Task::find($this->task_id);
        $this->groups = Group::all();
    }

    public function refreshEmployeeInfo()
    {
        $this->dispatchBrowserEvent('closeModal2');
        $this->emit('refreshTaskInfo');
        $this->emit('refreshMessages');
    }

    public function render()
    {
        return view('livewire.task.executorsadd', [
            'users' => User::paginate(5),
        ]);
    }
}
