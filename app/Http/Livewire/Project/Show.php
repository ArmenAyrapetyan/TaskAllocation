<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $projects;

    protected $listeners = [
        'checkProject',
        'getAllProjects',
    ];

    public function checkProject($id, $isStatus = false)
    {
        if ($isStatus){
            $this->projects = Project::where('status_id', $id)->orderBy('name')->get();
        } else {
            $this->projects = Project::where('group_id', $id)->orderBy('name')->get();
        }
        session()->put('curPage', 'project.index');
    }

    public function getAllProjects()
    {
        $this->projects = Project::orderBy('name')->get();
        session()->put('curPage', 'project.index');
    }

    public function mount()
    {
        $this->projects = Project::orderBy('name')->get();
        session()->put('curPage', 'project.index');
    }

    public function render()
    {
        return view('livewire.project.show');
    }
}
