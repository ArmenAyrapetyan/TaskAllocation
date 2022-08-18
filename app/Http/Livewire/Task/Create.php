<?php

namespace App\Http\Livewire\Task;

use App\Models\AccessRole;
use App\Models\AccessUser;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\TaskUser;
use Livewire\Component;

class Create extends Component
{
    public $task_data;
    public $projects;
    public $statuses;

    protected $rules = [
        'task_data.name' => 'required',
        'task_data.description' => 'required|max:600',
        'task_data.time_planned' => 'nullable|integer|min:0',
        'task_data.date_start' => 'required|date',
        'task_data.date_end' => 'required|date',
        'task_data.status_id' => 'required',
    ];

    protected $messages = [
        'task_data.name.required' => 'Заполните имя задачи',
        'task_data.description.required' => 'Напишите подробное описание задачи',
        'task_data.time_planned.integer' => 'Запланированное время должно быть числом',
        'task_data.time_planned.min' => 'Минимально запланированное время 0',
        'task_data.date_start.required' => 'Заполните дату начала выполнения задачи',
        'task_data.date_start.date' => 'Поле должно содержать дату',
        'task_data.date_end.required' => 'Заполните дату конца выполнения задачи',
        'task_data.date_end.date' => 'Поле должно содержать дату',
        'task_data.status_id.required' => 'У задачи должен быть статус',
    ];

    public function saveTask()
    {
        $this->validate();

        $this->task_data['project_id'] = $this->task_data['project_id'] != null
                ? $this->task_data['project_id']
                : null;

        $newTask = Task::create($this->task_data);

        AccessUser::create([
            'user_id' => auth()->id(),
            'role_id' => AccessRole::ROLE_CREATOR,
            'accessable_id' => $newTask->id,
            'accessable_type' => Task::class,
        ]);

        $this->task_data = null;
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshShow');
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
