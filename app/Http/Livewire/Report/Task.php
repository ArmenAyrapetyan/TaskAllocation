<?php

namespace App\Http\Livewire\Report;

use App\Services\ReportGenerate;
use Livewire\Component;

class Task extends Component
{
    public $tasks;

    protected $listeners = [
        'getTaskReport'
    ];

    public function getTaskReport($date_start, $date_end)
    {
        $this->tasks = ReportGenerate::generateRepotByTask();
    }

    public function render()
    {
        return view('livewire.report.task');
    }
}
