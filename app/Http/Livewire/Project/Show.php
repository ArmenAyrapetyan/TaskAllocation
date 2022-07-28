<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class Show extends Component
{
    public $projects;
    public $isLastSortAll;
    public $statusBool;
    public $importId;

    protected $listeners = [
        'checkProject',
        'getAllProjects',
        'refreshSort',
    ];

    public function refreshSort()
    {
        $this->isLastSortAll
            ? $this->getAllProjects()
            : $this->checkProject($this->importId, $this->statusBool);
    }

    public function checkProject($id, $isStatus = false)
    {
        $isStatus
            ? $this->projects = Project::where('status_id', $id)->orderBy('name')->get()
            : $this->projects = Project::where('group_id', $id)->orderBy('name')->get();
        $this->isLastSortAll = false;
        $this->statusBool = $isStatus;
        $this->importId = $id;
        session()->put('curPage', 'project.index');
    }

    public function getAllProjects()
    {
        $this->projects = Project::orderBy('name')->get();
        $this->isLastSortAll = true;
        session()->put('curPage', 'project.index');
    }

    public function mount()
    {
        $this->projects = Project::orderBy('name')->get();
        $this->isLastSortAll = true;
        session()->put('curPage', 'project.index');
    }

    public function render()
    {
        return view('livewire.project.show');
    }
}
