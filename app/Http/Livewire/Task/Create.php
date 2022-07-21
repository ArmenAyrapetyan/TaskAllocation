<?php

namespace App\Http\Livewire\Task;

use App\Models\Project;
use App\Models\Task;
use App\Models\TaskStatus;
use Livewire\Component;

class Create extends Component
{
    public $projects, $statuses;
    public $name, $description,
        $time_planned, $time_spend,
        $date_start, $date_end,
        $project_id, $status_id;

    protected $rules = [
        'name' => 'required',
        'description' => 'required|max:600',
        'time_planned' => 'nullable|integer|min:0',
        'time_spend' => 'nullable|integer|min:0',
        'date_start' => 'required|date',
        'date_end' => 'required|date',
        'status_id' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Заполните имя задачи',
        'description.required' => 'Напишите подробное описание задачи',
        'time_planned.integer' => 'Запланированное время должно быть числом',
        'time_planned.min' => 'Минимально запланированное время 0',
        'time_spend.integer' => 'Потраченное время должно быть числом',
        'time_spend.min' => 'Минимально потраченное время 0',
        'date_start.required' => 'Заполните дату начала выполнения задачи',
        'date_start.date' => 'Поле должно содержать дату',
        'date_end.required' => 'Заполните дату конца выполнения задачи',
        'date_end.date' => 'Поле должно содержать дату',
        'status_id.required' => 'У задачи должен быть статус',
    ];

    public function saveTask()
    {
        $this->validate();

        Task::create([
            'name' => $this->name,
            'description' => $this->description,
            'project_id' => $this->project_id,
            'status_id' => $this->status_id,
            'time_planned' => $this->time_planned,
            'time_spend' => $this->time_spend,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
        ]);

        $this->clear();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function mount()
    {
        $this->projects = Project::all();
        $this->statuses = TaskStatus::all();
    }

    public function render()
    {
        return view('livewire.task.create');
    }
}
