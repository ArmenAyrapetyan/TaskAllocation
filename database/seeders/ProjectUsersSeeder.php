<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectUsers;
use App\Models\User;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::pluck('id');
        $users = User::pluck('id');
        $insert = [];

        foreach ($projects as $project){
            $insert[] = [
                'user_id' => Lorem::randomElement($users),
                'project_id' => $project,
            ];
        }

        DB::table('project_users')->insert($insert);
    }
}
