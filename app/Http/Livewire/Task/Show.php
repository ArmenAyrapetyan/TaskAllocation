<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Show extends Component
{
    public $tasks;

    public function mount()
    {
        $this->tasks = Task::all();
        session()->put('curPage', 'task.index');
    }

    protected $listeners = [
        'getAll',
        'sortByStatus',
        'sortByProjectGroup',
        'refreshShow',
    ];

    public function refreshShow()
    {
        return;
    }

    public function getAll()
    {
        $this->tasks = Task::all();
        session()->put('curPage', 'task.index');
    }

    public function sortByStatus($id)
    {
        $this->tasks = Task::where('status_id', $id)->get();
        session()->put('curPage', 'task.index');
    }

    public function sortByProjectGroup($id)
    {
        $tasks = Task::has('project')->orderBy('project_id')->get();

        foreach ($tasks as $key => $task) {
            if ($task->project->group_id != $id) {
                $tasks->forget($key);
            }
        }
        session()->put('curPage', 'task.index');

        $this->tasks = $tasks;
    }

    public function render()
    {
        return view('livewire.task.show');
    }
}
