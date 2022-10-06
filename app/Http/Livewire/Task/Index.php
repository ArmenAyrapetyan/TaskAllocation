<?php

namespace App\Http\Livewire\Task;

use App\Models\ProjectGroup;
use App\Models\TaskStatus;
use Livewire\Component;

class Index extends Component
{
    public $statuses;
    public $projectGroups;

    public function mount()
    {
        $this->statuses = TaskStatus::all();
        $this->projectGroups = ProjectGroup::all();
    }

    public function getAllTasks()
    {
        $this->emit('getAllTasks');
    }

    public function sortTasks($id, $isStatus = false)
    {
        $this->emit('sortTasks', $id, $isStatus);
    }

    public function render()
    {
        return view('livewire.task.index');
    }
}
