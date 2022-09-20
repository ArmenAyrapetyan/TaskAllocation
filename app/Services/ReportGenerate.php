<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class ReportGenerate
{
    /**
     * @param array|null $id_employers - id нужных для отчета пользователей
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function generateReportByStaff(array $id_employers = null)
    {
        return $id_employers ? User::whereIn('id', $id_employers) : User::all();
    }

    /**
     * @param array|null $id_tasks - id нужных для отчета задач
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function generateRepotByTask(array $id_tasks = null, $date_start, $date_end)
    {
        return $id_tasks ? Task::whereIn('id', $id_tasks) : Task::all();
    }

    /**
     * @param array|null $id_projects
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function generateReportByProject(array $id_projects = null)
    {
        return $id_projects ? Project::whereIn('id', $id_projects) : Project::all();
    }
}
