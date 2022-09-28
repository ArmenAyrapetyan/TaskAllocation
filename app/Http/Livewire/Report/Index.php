<?php

namespace App\Http\Livewire\Report;

use App\Services\ReportGenerate;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public $date_start;
    public $date_end;
    public $report_type;

    public function mount()
    {
        $this->date_start = Carbon::now()->toDateString();
        $this->date_end = Carbon::now()->toDateString();
        $this->report_type = 'Task';
    }

    public function generateReport()
    {
        switch ($this->report_type){
            case 'Task':
                $this->emit('getTaskReport', $this->date_start, $this->date_end);
                break;
            case 'Project':
                $this->emit('getProjectReport');
                break;
            case 'Staff':
                $this->emit('getStaffReport', $this->date_start, $this->date_end);
                break;
        }
    }

    public function render()
    {
        return view('livewire.report.index');
    }
}
