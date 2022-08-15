<?php

namespace App\Http\Livewire\Project;

use App\Models\ProjectGroup;
use App\Models\ProjectStatus;
use Livewire\Component;

class Index extends Component
{
    public $statuses;
    public $groups;

    public function mount()
    {
        $this->groups = ProjectGroup::all();
        $this->statuses = ProjectStatus::all();
    }

    public function getAllProjects()
    {
        $this->emit('getAllProjects');
    }

    public function checkProject($id, $isStatus = false)
    {
        $this->emit('checkProject', $id, $isStatus);
    }

    public function render()
    {
        return view('livewire.project.index');
    }
}
