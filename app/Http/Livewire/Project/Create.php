<?php

namespace App\Http\Livewire\Project;

use App\Models\Counterparty;
use App\Models\Project;
use App\Models\ProjectGroup;
use App\Models\ProjectStatus;
use Livewire\Component;

class Create extends Component
{
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

    public function saveProject()
    {
        $this->validate();

        Project::create([
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => auth()->user()->id,
            'counterparty_id' => $this->counterparty,
            'group_id' => $this->group,
            'status_id' => $this->status,
        ]);

        $this->clear();
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshSort');
    }

    private function clear()
    {
        $this->name = null;
        $this->description = null;
        $this->counterparty = null;
        $this->group = null;
        $this->status = null;
    }

    public function mount()
    {
        $this->counterparties = Counterparty::select('id', 'name')->get();
        $this->groups = ProjectGroup::select('id', 'name')->get();
        $this->statuses = ProjectStatus::select('id', 'name')->get();
    }

    public function render()
    {
        return view('livewire.project.create');
    }
}
