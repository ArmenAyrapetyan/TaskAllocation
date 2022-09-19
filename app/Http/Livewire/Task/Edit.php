<?php

namespace App\Http\Livewire\Task;

use App\Models\Project;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Services\FileStorage;
use App\Services\Notifications;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $task_data;
    public $task;
    public $projects;
    public $statuses;
    public $files;

    protected $rules = [
        'task_data.name' => 'required',
        'task_data.description' => 'required|max:600',
        'task_data.time_planned' => 'nullable|integer|min:0',
        'task_data.date_start' => 'required|date',
        'task_data.date_end' => 'required|date',
        'task_data.status_id' => 'required',
        'files.*' => 'mimetypes:image/jpeg,image/png,image/webp,image/gif,video/mp4,video/webm,text/plain,
        application/x-rar-compressed,application/zip,application/x-gzip,application/pdf,application/msword,
        application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel',
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

        if ($this->files)
            FileStorage::saveFiles($this->files, $this->task->id, Task::class);

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
