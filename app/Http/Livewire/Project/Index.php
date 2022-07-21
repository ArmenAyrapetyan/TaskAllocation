<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use App\Models\ProjectGroup;
use App\Models\ProjectStatus;
use Livewire\Component;

class Index extends Component
{
    public $projects;
    public $groups;
    public $statuses;

    public function checkProject($id, $isStatus = false)
    {
        $this->emit('checkProject', $id, $isStatus);
    }

    public function getAllProjects()
    {
        $this->emit('getAllProjects');
    }

    public function mount()
    {
        $this->projects = Project::orderBy('name')->get();
        $this->groups = ProjectGroup::all();
        $this->statuses = ProjectStatus::all();
        session()->put('curPage', 'project.index');
    }

    public function render()
    {
        return view('livewire.project.index');
    }
}
