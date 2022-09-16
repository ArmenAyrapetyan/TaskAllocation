<?php

namespace Database\Seeders;

use App\Models\AccessRole;
use App\Models\Group;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [];

        $tasks = Task::pluck('id');
        $projects = Project::pluck('id');
        $users = User::pluck('id');
        $roles = AccessRole::pluck('id');
        for ($i = 0; $i < count($tasks); $i++) {
            for ($j = 0; $j < count($roles); $j++) {
                $input[] = [
                    'user_id' => Lorem::randomElement($users),
                    'role_id' => $roles[$j],
                    'accessable_id' => $tasks[$i],
                    'accessable_type' => Task::class,
                ];
            }
        }
        for ($i = 0; $i < count($projects); $i++) {
            $input[] = [
                'user_id' => Lorem::randomElement($users),
                'role_id' => AccessRole::ROLE_CREATOR,
                'accessable_id' => $projects[$i],
                'accessable_type' => Project::class,
            ];
        }

        DB::table('access_users')->insert($input);
    }
}
