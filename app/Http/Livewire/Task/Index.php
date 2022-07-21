<?php

namespace App\Http\Livewire\Task;

use App\Models\ProjectGroup;
use App\Models\Task;
use App\Models\TaskStatus;
use Livewire\Component;

class Index extends Component
{
    public $tasks;
    public $statuses;
    public $projectGroups;

    public function mount()
    {
        $this->tasks = Task::all();
        $this->statuses = TaskStatus::all();
        $this->projectGroups = ProjectGroup::all();
    }

    public function getAll()
    {
        $this->tasks = Task::all();
    }

    public function sortByStatus($id)
    {
        $this->tasks = Task::where('status_id', $id);
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
        return view('livewire.task.index');
    }
}
