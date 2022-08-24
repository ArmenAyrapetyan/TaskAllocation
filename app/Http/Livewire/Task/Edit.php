<?php

namespace App\Http\Livewire\Task;

use App\Models\Project;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Services\Notifications;
use Livewire\Component;

class Edit extends Component
{
    public $task_data;
    public $task;
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

    public function editTask()
    {
        $this->validate();

        $this->task->fill($this->task_data);
        $this->task->save();

        $message = 'Изменена задача';
        Notifications::sendTaskNotify(auth()->id(), $this->task->id, $message);

        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshTaskInfo');
    }

    public function mount($id)
    {
        $this->projects = Project::all();
        $this->statuses = TaskStatus::all();
        $this->task = Task::find($id);
        $this->task_data = $this->task->toArray();
    }

    public function render()
    {
        return view('livewire.task.edit');
    }
}
