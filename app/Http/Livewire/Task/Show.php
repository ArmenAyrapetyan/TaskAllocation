<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Show extends Component
{
    public $tasks;
    public $isLastSortAll;
    public $statusBool;
    public $importId;

    public function mount()
    {
        $this->isLastSortAll = true;
        $this->tasks = Task::all();
        session()->put('curPage', 'task.index');
    }

    protected $listeners = [
        'getAllTasks',
        'sortTasks',
        'refreshShow',
    ];

    public function refreshShow()
    {
        $this->isLastSortAll
            ? $this->getAllTasks()
            : $this->sortTasks($this->importId, $this->statusBool);
    }

    public function getAllTasks()
    {
        $this->tasks = Task::all();
        $this->isLastSortAll = true;
        $this->statusBool = null;
        $this->importId = null;
    }

    public function sortTasks($id, $isStatus = false)
    {
        if (!$isStatus){
            $tasks = Task::has('project')->orderBy('project_id')->get();

            foreach ($tasks as $key => $task) {
                if ($task->project->group_id != $id) {
                    $tasks->forget($key);
                }
            }
            $this->tasks = $tasks;
        }
        else
            $this->tasks = Task::where('status_id', $id)->get();

        $this->isLastSortAll = false;
        $this->statusBool = $isStatus;
        $this->importId = $id;
    }

    public function render()
    {
        return view('livewire.task.show');
    }
}
