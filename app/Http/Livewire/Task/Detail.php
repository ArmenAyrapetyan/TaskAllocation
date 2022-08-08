<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Detail extends Component
{
    public $task;
    public $task_id;

    public function mount($id)
    {
        $this->task_id = $id;
        $this->task = Task::find($id);
    }

    protected $listeners = [
        'refreshTaskInfo'
    ];

    public function refreshTaskInfo()
    {
        $this->task = Task::find($this->task_id);
    }

    public function render()
    {
        return view('livewire.task.detail');
    }
}
