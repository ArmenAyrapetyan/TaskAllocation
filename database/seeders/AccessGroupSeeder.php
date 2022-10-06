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

class AccessGroupSeeder extends Seeder
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
        $groups = Group::pluck('id');
        $roles = AccessRole::whereNotIn('id', [AccessRole::ROLE_CREATOR])->pluck('id');
        for ($i = 0; $i < count($tasks); $i++) {
            for ($j = 0; $j < count($roles); $j++) {
                $input[] = [
                    'group_id' => Lorem::randomElement($groups),
                    'role_id' => $roles[$j],
                    'accessable_id' => $tasks[$i],
                    'accessable_type' => Task::class,
                ];
            }
        }

        DB::table('access_groups')->insert($input);
    }
}
