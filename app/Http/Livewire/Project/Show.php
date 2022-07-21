<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class Show extends Component
{
    public $projects;

    protected $listeners = [
        'checkProject'
    ];

    public function checkProject($id, $isStatus = false)
    {
        if ($isStatus){
            $this->projects = Project::where('status_id', $id)->get();
        } else {
            $this->projects = Project::where('group_id', $id)->get();
        }
    }

    public function mount()
    {
        $this->projects = Project::all();
    }

    public function render()
    {
        return view('livewire.project.show');
    }
}
