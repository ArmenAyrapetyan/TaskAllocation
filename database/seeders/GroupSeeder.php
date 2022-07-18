<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [];

        $group_names = [
            'SEO',
            'Бэк-офис',
            'Маркетинг и PR',
            'Отдел дизайна',
            'Отдел контента',
            'Отдел продаж',
            'Программисты',
            'Реклама',
            'Служебная',
            'Таргет',
            'Управление проектами',
        ];

        for ($i = 0; $i < 11; $i++) {
            $groups[] = [
                'name' => $group_names[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('groups')->insert($groups);
    }
}
