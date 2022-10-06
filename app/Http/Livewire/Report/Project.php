<?php

namespace App\Http\Livewire\Report;

use App\Models\AccessUser;
use App\Models\TimeSpend;
use App\Services\ReportGenerate;
use Livewire\Component;
use Livewire\WithPagination;
use \App\Models\Task as Task;

class Project extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $project_inform;
    public $time_planned = 0;
    public $time_spend = 0;

    protected $listeners = [
        'getProjectReport'
    ];

    public function getProjectReport()
    {
        $this->project_inform = ReportGenerate::generateReportByProject();
        $tasks = Task::whereIn('project_id', $this->project_inform->pluck('id'));
        $this->time_planned = array_sum($tasks->pluck('time_planned')->toArray());
        $this->time_spend = number_format(array_sum(TimeSpend::whereIn('access_user_id', AccessUser::where('accessable_type', Task::class)
                ->whereIn('accessable_id', $tasks->pluck('id'))->pluck('id'))->pluck('time_spend')
                ->toArray()) / 60, 2, '.', '');
    }

    public function render()
    {
        return view('livewire.report.project', ['projects' => collect($this->project_inform)->paginate(10)]);
    }
}
