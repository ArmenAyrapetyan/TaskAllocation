<?php

namespace App\Http\Livewire\Project;

use App\Models\Counterparty;
use App\Models\Project;
use App\Models\ProjectGroup;
use App\Models\ProjectStatus;
use Livewire\Component;

class Edit extends Component
{
    public $project;
    public $counterparties;
    public $statuses;
    public $groups;
    public $name;
    public $description;
    public $counterparty;
    public $group;
    public $status;

    protected $rules = [
        'name' => 'required',
        'description' => 'required|max:600',
        'group' => 'required',
        'status' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Введите имя',
        'description.required' => 'Заполните описание',
        'description.max' => 'Слишком много символов',
        'group.required' => 'Выберите группу проекта',
        'status.required' => 'Выберите статус проекта',
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function editProject()
    {
        $this->validate();

        if ($this->project->name != $this->name) $this->project->name = $this->name;
        if ($this->project->description != $this->description) $this->project->description = $this->description;
        if ($this->project->counterparty_id != $this->counterparty) $this->project->counterparty_id = $this->counterparty;
        if ($this->project->group_id != $this->group) $this->project->group_id = $this->group;
        if ($this->project->status_id != $this->status) $this->project->status_id = $this->status;
        $this->project->save();

        $this->clear();
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshProjectInfo');
    }

    private function clear()
    {
        $this->name = null;
        $this->description = null;
        $this->counterparty = null;
        $this->group = null;
        $this->status = null;
    }

    public function mount($id)
    {
        $this->counterparties = Counterparty::select('id', 'name')->get();
        $this->groups = ProjectGroup::select('id', 'name')->get();
        $this->statuses = ProjectStatus::select('id', 'name')->get();
        $this->project = Project::find($id);
        $this->name = $this->project->name;
        $this->description = $this->project->description;
        $this->counterparty = $this->project->counterparty_id;
        $this->group = $this->project->group_id;
        $this->status = $this->project->status_id;
    }

    public function render()
    {
        return view('livewire.project.edit');
    }
}
