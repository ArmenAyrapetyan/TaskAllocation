<?php

namespace Database\Seeders;

use App\Models\Counterparty;
use App\Models\Dictionary;
use App\Models\Project;
use App\Models\SubDictionary;
use App\Models\Task;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectAccessesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [];

        $dictionaries = Dictionary::pluck('id');
        $sub_dictionaries = SubDictionary::pluck('id');
        $projects = Project::pluck('id');
        $tasks = Task::pluck('id');
        for ($i = 0; $i < count($dictionaries); $i++) {
            $type = Lorem::randomElement([Task::class, Project::class]);
            $id = 0;
            if ($type == Task::class)
                $id = Lorem::randomElement($tasks);
            else
                $id = Lorem::randomElement($projects);
            $input[] = [
                'information' => Lorem::text(150),
                'dictionariable_id' => $dictionaries[$i],
                'dictionariable_type' => Dictionary::class,
                'objectable_type' => $type,
                'objectable_id' => $id,
            ];
        }
        for ($i = 0; $i < count($sub_dictionaries); $i++) {
            $type = Lorem::randomElement([Task::class, Project::class]);
            $id = 0;
            if ($type == Task::class)
                $id = Lorem::randomElement($tasks);
            else
                $id = Lorem::randomElement($projects);
            $input[] = [
                'information' => Lorem::text(150),
                'dictionariable_id' => $sub_dictionaries[$i],
                'dictionariable_type' => SubDictionary::class,
                'objectable_type' => $type,
                'objectable_id' => $id,
            ];
        }

        DB::table('project_accesses')->insert($input);
    }
}
