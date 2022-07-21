<?php

namespace App\Http\Livewire\Task;

use App\Models\ProjectGroup;
use App\Models\Task;
use App\Models\TaskStatus;
use Livewire\Component;

class Index extends Component
{
    public $tasks;
    public $statuses;
    public $projectGroups;

    public function mount()
    {
        $this->tasks = Task::all();
        $this->statuses = TaskStatus::all();
        $this->projectGroups = ProjectGroup::all();
        session()->put('curPage', 'task.index');
    }

    public function getAll()
    {
        $this->emit('getAll');
    }

    public function sortByStatus($id)
    {
        $this->emit('sortByStatus', $id);
    }

    public function sortByProjectGroup($id)
    {
        $this->emit('sortByProjectGroup', $id);
    }

    public function render()
    {
        return view('livewire.task.index');
    }
}
