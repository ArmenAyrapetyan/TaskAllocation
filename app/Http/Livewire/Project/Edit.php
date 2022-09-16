<?php

namespace App\Http\Livewire\Project;

use App\Models\Counterparty;
use App\Models\Project;
use App\Models\ProjectGroup;
use App\Models\ProjectStatus;
use App\Services\FileStorage;
use Livewire\Component;
use Livewire\WithFileUploads;

class
Edit extends Component
{
    use WithFileUploads;

    public $project_data;
    public $project;
    public $files;
    public $counterparties;
    public $statuses;

    protected $rules = [
        'project_data.name' => 'required',
        'project_data.description' => 'required|max:600',
        'project_data.counterparty_id' => 'required',
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

    public function mount($id)
    {
        $this->counterparties = Counterparty::select('id', 'name')->get();
        $this->groups = ProjectGroup::select('id', 'name')->get();
        $this->statuses = ProjectStatus::select('id', 'name')->get();
        $this->project = Project::find($id);
        $this->project_data = $this->project->toArray();
    }

    public function editProject()
    {
        $this->validate();

        if ($this->files)
            FileStorage::saveFiles($this->files, $this->project->id, Project::class);

        $this->project->fill($this->project_data);
        $this->project->save();
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshProjectInfo');
    }

    public function render()
    {
        return view('livewire.project.edit');
    }
}
