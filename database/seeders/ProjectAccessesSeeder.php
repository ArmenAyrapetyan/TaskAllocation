<?php

namespace Database\Seeders;

use App\Models\Counterparty;
use App\Models\Dictionary;
use App\Models\Project;
use App\Models\SubDictionary;
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
        $project = Project::pluck('id');
        $counterparties = Counterparty::pluck('id');
        for ($i = 0; $i < count($dictionaries); $i++) {
            $input[] = [
                'information' => Lorem::text(150),
                'dictionariable_id' => $dictionaries[$i],
                'dictionariable_type' => Dictionary::class,
                'project_id' => Lorem::randomElement($project),
                'counterparty_id' => Lorem::randomElement($counterparties),
            ];
        }
        for ($i = 0; $i < count($sub_dictionaries); $i++) {
            $input[] = [
                'information' => Lorem::text(150),
                'dictionariable_id' => $sub_dictionaries[$i],
                'dictionariable_type' => SubDictionary::class,
                'project_id' => Lorem::randomElement($project),
                'counterparty_id' => Lorem::randomElement($counterparties),
            ];
        }

        DB::table('project_accesses')->insert($input);
    }
}
