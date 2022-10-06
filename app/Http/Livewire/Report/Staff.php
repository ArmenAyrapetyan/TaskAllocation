<?php

namespace App\Http\Livewire\Report;

use App\Services\ReportGenerate;
use Livewire\Component;
use Livewire\WithPagination;
use \App\Models\Task as Task;

class Staff extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $resultInfo = [
        'result' => [],
        'all_time_planned' => 1,
        'all_time_spended' => 1,
    ];
    public $all_time_planned;
    public $all_time_spended;

    protected $listeners = [
        'getStaffReport'
    ];

    public function boot()
    {
        $this->resetPage();
    }

    public function getStaffReport($date_start, $date_end)
    {
        $this->resultInfo = ReportGenerate::generateReportByStaff(null, $date_start, $date_end);
    }

    public function render()
    {
        return view('livewire.report.staff', ['result' => collect($this->resultInfo['result'])->paginate(5)]);
    }
}
