<?php

namespace App\Http\Livewire\Project;

use App\Models\AccessRole;
use App\Models\AccessUser;
use App\Models\Counterparty;
use App\Models\Project;
use App\Models\ProjectGroup;
use App\Models\ProjectStatus;
use App\Services\FileStorage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $project_data;
    public $counterparties;
    public $statuses;
    public $groups;
    public $files;
    public bool $is_have_files;

    protected $rules = [
        'project_data.name' => 'required',
        'project_data.description' => 'required|max:600',
        'project_data.group_id' => 'required',
        'project_data.status_id' => 'required',
        'files.*' => 'mimes:jpeg,bmp,png,gif,svg,pdf,doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,txt',
    ];

    protected $messages = [
        'project_data.name.required' => 'Введите имя',
        'project_data.description.required' => 'Заполните описание',
        'project_data.description.max' => 'Слишком много символов',
        'project_data.group_id.required' => 'Выберите группу проекта',
        'project_data.status_id.required' => 'Выберите статус проекта',
    ];

    public function mount()
    {
        $this->files = null;
        $this->is_have_files = false;
        $this->counterparties = Counterparty::select('id', 'name')->get();
        $this->groups = ProjectGroup::select('id', 'name')->get();
        $this->statuses = ProjectStatus::select('id', 'name')->get();
    }

    public function saveProject()
    {
        $this->validate();

        $project = Project::create($this->project_data);

        AccessUser::create([
            'user_id' => auth()->id(),
            'role_id' => AccessRole::ROLE_CREATOR,
            'accessable_id' => $project->id,
            'accessable_type' => Project::class,
        ]);

        if ($this->files)
            FileStorage::saveFiles($this->files, $project->id, Project::class);

        $this->files = null;
        $this->project_data = null;
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshSort');
    }

    public function render()
    {
        return view('livewire.project.create');
    }
}
