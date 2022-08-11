<?php

namespace App\Http\Livewire\Task;

use App\Models\Project;
use App\Models\Task;
use App\Models\TaskRole;
use App\Models\TaskStatus;
use App\Models\TaskUser;
use Livewire\Component;

class Edit extends Component
{
    public $task;
    public $projects;
    public $statuses;
    public $name;
    public $description;
    public $time_planned;
    public $date_start;
    public $date_end;
    public $project_id;
    public $status_id;

    protected $rules = [
        'name' => 'required',
        'description' => 'required|max:600',
        'time_planned' => 'nullable|integer|min:0',
        'date_start' => 'required|date',
        'date_end' => 'required|date',
        'status_id' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Заполните имя задачи',
        'description.required' => 'Напишите подробное описание задачи',
        'time_planned.integer' => 'Запланированное время должно быть числом',
        'time_planned.min' => 'Минимально запланированное время 0',
        'date_start.required' => 'Заполните дату начала выполнения задачи',
        'date_start.date' => 'Поле должно содержать дату',
        'date_end.required' => 'Заполните дату конца выполнения задачи',
        'date_end.date' => 'Поле должно содержать дату',
        'status_id.required' => 'У задачи должен быть статус',
    ];

    public function editTask()
    {
        $this->validate();

        if ($this->task->nane != $this->name) $this->task->name = $this->name;
        if ($this->task->description != $this->description) $this->task->description = $this->description;
        if ($this->task->time_planned != $this->time_planned) $this->task->time_planned = $this->time_planned;
        if ($this->task->date_start != $this->date_start) $this->task->date_start = $this->date_start;
        if ($this->task->date_end != $this->date_end) $this->task->date_end = $this->date_end;
        if ($this->task->status_id != $this->status_id) $this->task->status_id = $this->status_id;
        $this->task->save();

        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshTaskInfo');
    }

    public function mount($id)
    {
        $this->projects = Project::all();
        $this->statuses = TaskStatus::all();
        $this->task = Task::find($id);
        $this->name = $this->task->name;
        $this->description = $this->task->description;
        $this->time_planned = $this->task->time_planned;
        $this->date_start = $this->task->date_start;
        $this->date_end = $this->task->date_end;
        $this->project_id = $this->task->project_id;
        $this->status_id = $this->task->status_id;
    }

    public function render()
    {
        return view('livewire.task.edit');
    }
}
