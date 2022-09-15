<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use App\Services\FileStorage;
use Livewire\Component;

class Detail extends Component
{
    public $project;
    public $project_id;

    public function mount($id)
    {
        $this->project_id = $id;
        $this->refreshProjectInfo();
    }

    protected $listeners = [
      'refreshProjectInfo'
    ];

    public function downloadFile($path)
    {
        return FileStorage::download($path);
    }

    public function refreshProjectInfo()
    {
        $this->project = Project::find($this->project_id);
    }

    public function render()
    {
        return view('livewire.project.detail');
    }
}
