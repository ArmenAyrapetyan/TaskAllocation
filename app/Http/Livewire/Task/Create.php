<?php

namespace App\Http\Livewire\Task;

use App\Models\Project;
use App\Models\Task;
use App\Models\TaskRole;
use App\Models\TaskStatus;
use App\Models\TaskUser;
use Livewire\Component;

class Create extends Component
{
    public $projects, $statuses;
    public $name, $description,
        $time_planned, $time_spend,
        $date_start, $date_end,
        $project_id, $status_id;

    public $response;

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

        $newTask = Task::create([
            'name' => $this->name,
            'description' => $this->description,
            'project_id' => $this->project_id,
            'status_id' => $this->status_id,
            'time_planned' => $this->time_planned,
            'time_spend' => $this->time_spend,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
        ]);

        if ($newTask) {
            TaskUser::create([
                'task_id' => $newTask->id,
                'user_id' => auth()->user()->id,
                'task_role_id' => TaskRole::ROLE_CREATOR,
            ]);
            $this->response = "Задача создана";
        } else
            $this->response = "Ошибка создания задачи";

        $this->clear();
    }

    public function clear()
    {
        $this->name = null;
        $this->description = null;
        $this->project_id = null;
        $this->status_id = null;
        $this->time_planned = null;
        $this->time_spend = null;
        $this->date_start = null;
        $this->date_end = null;
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
