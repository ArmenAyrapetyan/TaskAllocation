<?php

namespace App\Http\Livewire\Main;

use App\Models\Task;
use App\Models\TaskRole;
use App\Models\TaskStatus;
use App\Models\TaskUser;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{
    public $new_tasks;
    public $active_tasks;
    public $audit_tasks;

    public function mount()
    {
        $taskStatuses = [
            TaskStatus::STATUS_CANCELLED,
            TaskStatus::STATUS_COMPLETED,
            TaskStatus::STATUS_DONE,
        ];

        $this->new_tasks = Task::where('status_id', TaskStatus::STATUS_NEW)->get();

        $this->active_tasks = auth()->user()->activeTasks();

        $this->audit_tasks = auth()->user()->auditableTasks();
    }

    public function render()
    {
        return view('livewire.main.show');
    }
}
