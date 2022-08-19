<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $isLastSortAll;
    public $statusBool;
    public $importId;

    public function mount()
    {
        $this->isLastSortAll = true;
        $this->refreshShow();
    }

    protected $listeners = [
        'getAllTasks',
        'sortTasks',
        'refreshShow',
    ];

    public function refreshShow()
    {
        if($this->isLastSortAll)
            return $this->getAllTasks();
        else
            return $this->sortTasks($this->importId, $this->statusBool);
    }

    public function getAllTasks()
    {
        $this->isLastSortAll = true;
        return Task::paginate(5);
    }

    public function sortTasks($id, $isStatus = false)
    {
        $this->isLastSortAll = false;
        $this->statusBool = $isStatus;
        $this->importId = $id;

        if (!$isStatus)
            return Task::whereHas('project', function ($project){$project->where('group_id', $this->importId);})->paginate(5);
        else
            return Task::where('status_id', $id)->paginate(5);
    }

    public function render()
    {
        return view('livewire.task.show', [
            'tasks' => $this->refreshShow()
        ]);
    }
}
