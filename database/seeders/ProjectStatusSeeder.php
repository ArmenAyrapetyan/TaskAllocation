<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [];

        $nameStatus = [
            'Активный',
            'Завершенный',
            'Черновик',
        ];

        for ($i =0; $i < 3; $i++){
            $statuses[] = [
                'name' => $nameStatus[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('project_statuses')->insert($statuses);
    }
}
