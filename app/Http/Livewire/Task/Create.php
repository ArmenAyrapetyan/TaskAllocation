<?php

namespace App\Http\Livewire\Task;

use App\Models\AccessRole;
use App\Models\AccessUser;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Services\FileStorage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $task_data;
    public $projects;
    public $statuses;
    public $files;
    public bool $is_have_files;

    protected function rules()
    {
        return [
            'task_data.name' => 'required',
            'task_data.description' => 'required',
            'task_data.time_planned' => 'nullable|integer|min:0',
            'task_data.date_start' => 'required|date',
            'task_data.date_end' => 'required|date',
            'task_data.status_id' => 'required',
            'files.*' => 'mimes:jpeg,bmp,png,gif,svg,pdf,doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,txt',
        ];
    }

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

        if ($this->files)
            FileStorage::saveFiles($this->files, $newTask->id, Task::class);

        $this->files = null;
        $this->task_data = null;
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshShow');
    }

    public function mount()
    {
        $this->files = null;
        $this->task_data['project_id'] = null;
        $this->is_have_files = false;
        $this->projects = Project::all();
        $this->statuses = TaskStatus::all();
    }

    public function render()
    {
        return view('livewire.task.create');
    }
}
