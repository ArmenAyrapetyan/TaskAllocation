<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [];

        $nameGroups = [
            'Клиент',
            'Конкурент',
            'Партнер',
            'Подрядчик',
            'Поставщик',
        ];

        for ($i = 0; $i < 3; $i++){
            $groups[] = [
                'name' => $nameGroups[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('special_groups')->insert($groups);
    }
}
