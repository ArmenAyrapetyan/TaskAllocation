<?php

namespace Database\Seeders;

use App\Models\Task;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = Task::all();

        $messages = [];

        foreach ($tasks as $task) {
            $users = $task->users;
            foreach ($users as $user) {
                $messages[] = [
                    'text' => Lorem::text(),
                    'user_id' => $user->user_id,
                    'task_id' => $task->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('messages')->insert($messages);
    }
}
