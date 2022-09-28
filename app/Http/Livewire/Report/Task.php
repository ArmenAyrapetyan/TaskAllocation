<?php

namespace App\Http\Livewire\Report;

use App\Services\ReportGenerate;
use Livewire\Component;
use Livewire\WithPagination;
use function GuzzleHttp\Promise\task;

class Task extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $tasks;
    public $result;
    public $resultReport;
    public $date_start;
    public $date_end;

    protected $listeners = [
        'getTaskReport'
    ];

    public function booted()
    {
        $this->resetPage();
    }

    public function getTaskReport($date_start, $date_end)
    {
        $this->date_start = date('Y-m-d', strtotime($date_start . '-1 days'));
        $this->date_end = date('Y-m-d', strtotime($date_end . '+1 days'));
        $this->resetPage();
        $this->tasks = ReportGenerate::generateRepotByTask(null, $this->date_start, $this->date_end);
        $this->result = $this->tasks[0];
        $this->resultReport = $this->tasks[1];
    }

    public function render()
    {
        return view('livewire.report.task', ['taskInfos' => collect($this->result)->paginate(10)]);
    }
}
