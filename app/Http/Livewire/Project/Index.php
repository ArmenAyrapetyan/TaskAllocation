<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class Index extends Component
{
    public $types = [
        'project1',
        'project2',
        'project3',
        'project4',
    ];

    public $projects;

    public function mount()
    {
        $this->projects = Project::all();
    }

    public function render()
    {
        return view('livewire.project.index');
    }
}
