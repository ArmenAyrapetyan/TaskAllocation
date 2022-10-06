<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $isLastSortAll;
    public $statusBool;
    public $importId;

    protected $listeners = [
        'checkProject',
        'getAllProjects',
        'refreshSort',
    ];

    public function booted()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->isLastSortAll = true;
    }

    public function refreshSort()
    {
        if ($this->isLastSortAll)
            return $this->getAllProjects();
        else
            return $this->checkProject($this->importId, $this->statusBool);
    }

    public function checkProject($id, $isStatus = false)
    {
        $this->isLastSortAll = false;
        $this->statusBool = $isStatus;
        $this->importId = $id;
        if ($isStatus)
            return Project::where('status_id', $id)->orderBy('name')->paginate(20);
        else
            return Project::where('group_id', $id)->orderBy('name')->paginate(20);
    }

    public function getAllProjects()
    {
        $this->isLastSortAll = true;
        return Project::orderBy('name')->paginate(20);
    }

    public function render()
    {
        return view('livewire.project.show', [
            'projects' => $this->refreshSort()
        ]);
    }
}
