<?php

namespace App\Services;

use App\Models\Project;
use App\Models\ProjectStatus;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Models\Task;
use App\Models\User;
use Livewire\WithPagination;

class ReportGenerate
{
    use WithPagination;

    /**
     * @param array|null $id_employers - id нужных для отчета пользователей
     * @return Collection
     */
    public static function generateReportByStaff(array $id_employers = null, $date_start, $date_end)
    {
        $date_end = date('Y-m-d', strtotime($date_end . '+1 days'));
        $date_start = date('Y-m-d', strtotime($date_start . '-1 days'));
        $result = new Collection();
        $all_result = new Collection();
        $all_time_spended = 0;
        $all_time_planned = 0;
        $all_used_tasks = [];

        $users = User::select('id', 'first_name', 'last_name', 'third_name', 'rate_per_hour')->get();

        foreach ($users as $user) {
            $arrayInfo = [
                'user' => $user->toArray(),
                'time_planned' => 0,
                'time_spend' => 0
            ];

            foreach ($user->userAccesses->where('accessable_type', Task::class) as $access) {
                $arrayMessages = [];
                $arrayInfo['time_planned'] += $access->toAll->time_planned;

                foreach (collect($access->times)->whereBetween('created_at', [$date_start, $date_end]) as $time) {

                    $arrayInfo['time_spend'] += (double)number_format($time['time_spend'] / 60, 2, '.', '');
                    $arrayMessages[] = $time->toArray();
                }

                if (!empty($arrayMessages)) {
                    $all_used_tasks[] = $access->accessable_id;
                    $all_time_spended = array_sum(Arr::pluck($arrayMessages, 'time_spend'));
                    $arrayInfo['task'][] = [
                        'info' => $access->toAll->toArray(),
                        'messages' => $arrayMessages,
                    ];
                }
            }
            $result->push($arrayInfo);
            $all_time_planned = array_sum(Task::whereIn('id', array_unique($all_used_tasks))->pluck('time_planned')->toArray());
            $all_result->put('all_time_planned', $all_time_planned);
            $all_result->put('all_time_spended', $all_time_spended);
            $all_result->put('result', $result);
        }
        return $all_result;
    }

    /**
     * @param array|null $id_tasks - id нужных для отчета задач
     * @return array
     */
    public static function generateRepotByTask(array $id_tasks = null, $date_start, $date_end)
    {
        $date_end = date('Y-m-d', strtotime($date_end . '+1 days'));
        $date_start = date('Y-m-d', strtotime($date_start . '-1 days'));
        $id_tasks
            ? $tasks = Task::whereIn('id', $id_tasks)->orderBy('name')->get()
            : $tasks = Task::orderBy('name')->get();
        $collection = new Collection;
        $sum_time_spend = 0;
        $sum_time_planned = 0;

        foreach ($tasks as $task) {
            if (count($task->time->whereBetween('updated_at', [$date_start, $date_end])) > 0) {
                $collection[] = collect([
                    'task' => $task,
                    'task_time_spends' => $task->time->whereBetween('updated_at', [$date_start, $date_end]),
                    'time_spend' => $task->timeSpend(),
                ]);
                $sum_time_spend += array_sum($task->time->whereBetween('updated_at', [$date_start, $date_end])->pluck('time_spend')->toArray());
                $sum_time_planned += (int)$task->time_planned;
            }
        }

        $resultCollection = collect([
            'sum_time_spend' => number_format((int)$sum_time_spend / 60, 2, '.', ''),
            'sum_time_planned' => $sum_time_planned,
        ]);

        return array($collection, $resultCollection);
    }

    /**
     * @param array|null $id_projects
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function generateReportByProject(array $id_projects = null)
    {
        $projects = $id_projects
            ? Project::whereIn('id', $id_projects)
            : Project::where('status_id', '!=', ProjectStatus::STATUS_COMPLETE)->get();
        return $projects;
    }
}
