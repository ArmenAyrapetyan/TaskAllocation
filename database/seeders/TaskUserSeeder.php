<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = Task::all();
        $users = User::all()->count();
        $roles = TaskRole::all();

        $taskusers = [];


        foreach ($tasks as $task) {
            foreach ($roles as $role) {
                $taskusers[] = [
                    'task_id' => $task->id,
                    'user_id' => random_int(1, $users),
                    'time_spend' => random_int(1, 100),
                    'task_role_id' => $role->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('task_users')->insert($taskusers);
    }
}
