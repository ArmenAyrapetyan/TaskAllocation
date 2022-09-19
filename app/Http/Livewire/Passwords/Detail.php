<?php

namespace App\Http\Livewire\Passwords;

use App\Models\File;
use App\Models\Project;
use App\Models\ProjectAccesses;
use App\Models\Task;
use App\Services\FileStorage;
use Livewire\Component;

class Detail extends Component
{
    public $info;
    public $info_id;
    public $project;
    public $counterparty;
    public $dictionary;

    public function mount($info_id)
    {
        $this->info_id = $info_id;
        $this->refreshView();
    }

    public function getInfo()
    {
        if (get_class($this->info->object) == Task::class) {
            if ($this->info->object->project) {
                $this->project = $this->info->object->project;
                if ($this->info->object->project->counterparty)
                    $this->counterparty = $this->project->counterparty;
            }
        } else {
            if (get_class($this->info->object) == Project::class) {
                $this->project = $this->info->object;
                if ($this->info->object->counterparty)
                    $this->counterparty = $this->project->counterparty;
            }
        }
    }

    public function refreshView()
    {
        $this->info = ProjectAccesses::find($this->info_id);
        $this->dictionary = $this->info->dictionary;
        $this->getInfo();
    }

    public function deleteFile(File $file)
    {
        FileStorage::fileDelete($file->path);
        $file->delete();
        $this->refreshView();
    }

    public function downloadFile($path)
    {
        return FileStorage::download($path);
    }

    public function render()
    {
        return view('livewire.passwords.detail');
    }
}
