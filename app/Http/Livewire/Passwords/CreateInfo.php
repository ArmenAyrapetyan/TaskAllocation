<?php

namespace App\Http\Livewire\Passwords;

use App\Models\Dictionary;
use App\Models\Project;
use App\Models\ProjectAccesses;
use App\Models\SubDictionary;
use App\Models\Task;
use Livewire\Component;

class CreateInfo extends Component
{
    public $dictionaries;
    public $subdictionaries;
    public $tasks;
    public $projects;

    public $is_task;
    public $is_dictionary;
    public $object_id;
    public $dict_id;
    public $information;

    protected $rules = [
        'object_id' => 'required',
        'dict_id' => 'required',
        'information' => 'required',
    ];

    protected $messages = [
        'object_id.required' => 'Поле :attribute должно быть заполненно',
        'dict_id.required' => 'Поле :attribute должно быть заполненно',
        'information.required' => 'Поле :attribute должно быть заполненно',
    ];

    public function mount()
    {
        $this->subdictionaries = SubDictionary::select('id', 'name')->orderBy('name')->get();
        $this->dictionaries = Dictionary::select('id', 'name')->orderBy('name')->get();
        $this->tasks = Task::select('id', 'name')->orderBy('name')->get();
        $this->projects = Project::select('id', 'name')->orderBy('name')->get();
        $this->is_task = true;
        $this->is_dictionary = true;
    }

    public function createInformation()
    {
        ProjectAccesses::create([
            'information' => $this->information,
            'dictionariable_type' => $this->is_dictionary ? Dictionary::class : SubDictionary::class,
            'dictionariable_id' => $this->dict_id,
            'objectable_type' => $this->is_task ? Task::class : Project::class,
            'objectable_id' => $this->object_id,
        ]);
        $this->refresh();
    }

    public function refresh()
    {
        $this->information = null;
        $this->is_dictionary = false;
        $this->dict_id = 0;
        $this->is_task = false;
        $this->object_id = 0;
    }

    public function render()
    {
        return view('livewire.passwords.create-info');
    }
}
