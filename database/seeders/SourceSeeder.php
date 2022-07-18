<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources = [];

        $nameSource = [
            'Заявка с сайта',
            'Звонок',
            'Электронная почта',
            'Вебинар или семинар',
            'Социальная сеть',
            'Рекомендации',
        ];

        for ($i = 0; $i < 6; $i++){
            $sources[] = [
                'name' => $nameSource[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('sources')->insert($sources);
    }
}
