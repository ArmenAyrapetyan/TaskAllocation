<?php

namespace App\Http\Livewire\Passwords;

use App\Models\Dictionary;
use App\Models\Project;
use App\Models\ProjectAccesses;
use App\Models\SubDictionary;
use App\Models\Task;
use App\Services\FileStorage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateInfo extends Component
{
    use WithFileUploads;

    public $dictionaries;
    public $subdictionaries;
    public $tasks;
    public $projects;

    public $is_task;
    public $is_dictionary;
    public $object_id;
    public $dict_id;
    public $information;
    public $files;

    protected $rules = [
        'object_id' => 'required',
        'dict_id' => 'required',
        'information' => 'required',
        'files.*' => 'mimetypes:image/jpeg,image/png,image/webp,image/gif,video/mp4,video/webm,text/plain,
        application/x-rar-compressed,application/zip,application/x-gzip,application/pdf,application/msword,
        application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel',
    ];

    protected $messages = [
        'object_id.required' => 'Поле :attribute должно быть заполненно',
        'dict_id.required' => 'Поле :attribute должно быть заполненно',
        'information.required' => 'Поле :attribute должно быть заполненно',
        'files.*.mimes' => 'Один или несколько файлов не соответсвуют требуемому формату',
    ];

    public function mount()
    {
        $this->subdictionaries = SubDictionary::select('id', 'name')->orderBy('name')->get();
        $this->dictionaries = Dictionary::select('id', 'name')->orderBy('name')->get();
        $this->tasks = Task::select('id', 'name')->orderBy('name')->get();
        $this->projects = Project::select('id', 'name')->orderBy('name')->get();
        $this->refresh();
    }

    public function createInformation()
    {
        $this->validate();

        $prj_access = ProjectAccesses::create([
            'information' => $this->information,
            'dictionariable_type' => $this->is_dictionary ? Dictionary::class : SubDictionary::class,
            'dictionariable_id' => $this->dict_id,
            'objectable_type' => $this->is_task ? Task::class : Project::class,
            'objectable_id' => $this->object_id,
        ]);

        if ($this->files)
            FileStorage::saveFiles($this->files, $prj_access->id, ProjectAccesses::class);

        $this->dispatchBrowserEvent('closeModal');
        $this->refresh();
    }

    public function refresh()
    {
        $this->information = null;
        $this->files = null;
        $this->dict_id = null;
        $this->object_id = null;
        $this->is_dictionary = false;
        $this->is_task = false;
    }

    public function render()
    {
        return view('livewire.passwords.create-info');
    }
}
