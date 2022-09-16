<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [];

        $nameGroupd = [
          'Сделки',
          'Разработка',
          'Реклама',
          'Документооборот',
          'Амадо',
          'Архив',
          'База знаний',
        ];

        for ($i = 0; $i < 7; $i++){
            $groups[] = [
                'name' => $nameGroupd[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('project_groups')->insert($groups);
    }
}
