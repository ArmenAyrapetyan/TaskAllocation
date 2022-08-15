<?php

namespace App\Http\Livewire\Project;

use App\Models\Counterparty;
use App\Models\Project;
use App\Models\ProjectGroup;
use App\Models\ProjectStatus;
use Livewire\Component;

class Create extends Component
{
    public $project_data;
    public $counterparties;
    public $statuses;
    public $groups;

    protected $rules = [
        'project_data.name' => 'required',
        'project_data.description' => 'required|max:600',
        'project_data.counterparty_id' => 'required',
        'project_data.group_id' => 'required',
        'project_data.status_id' => 'required',
    ];

    protected $messages = [
        'project_data.name.required' => 'Введите имя',
        'project_data.description.required' => 'Заполните описание',
        'project_data.description.max' => 'Слишком много символов',
        'project_data.group_id.required' => 'Выберите группу проекта',
        'project_data.status_id.required' => 'Выберите статус проекта',
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function saveProject()
    {
        $this->validate();

        Project::create($this->project_data);

        $this->project_data = null;
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshSort');
    }

    public function mount()
    {
        $this->project_data = [
          'user_id' => auth()->id(),
        ];
        $this->counterparties = Counterparty::select('id', 'name')->get();
        $this->groups = ProjectGroup::select('id', 'name')->get();
        $this->statuses = ProjectStatus::select('id', 'name')->get();
    }

    public function render()
    {
        return view('livewire.project.create');
    }
}
