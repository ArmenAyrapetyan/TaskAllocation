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
    }

    protected $listeners = [
      'getAll',
      'sortByStatus',
      'sortByProjectGroup',
    ];

    public function getAll()
    {
        $this->tasks = Task::all();
    }

    public function sortByStatus($id)
    {
        $this->tasks = Task::where('status_id', $id)->get();
    }

    public function sortByProjectGroup($id)
    {
        $tasks = Task::all();

        foreach ($tasks as $key => $task){
            if (!$task->project){
                $tasks->forget($key);
            }

            if ($task->project->id != $id){
                $tasks->forget($key);
            }
        }

        $this->tasks = $tasks;
    }

    public function render()
    {
        return view('livewire.task.show');
    }
}
