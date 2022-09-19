<?php

namespace App\Http\Livewire\Passwords;

use App\Models\Project;
use App\Models\ProjectAccesses;
use App\Models\Task;
use Livewire\Component;

class Detail extends Component
{
    public $info;
    public $project;
    public $counterparty;

    public function mount($info_id)
    {
        $this->info = ProjectAccesses::find($info_id);
        $this->getInfo();
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

    public function render()
    {
        return view('livewire.passwords.detail');
    }
}
