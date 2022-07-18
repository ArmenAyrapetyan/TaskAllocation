<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskStatusSeeder extends Seeder
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
            'Новая',
            'В работе',
            'Выполненная',
            'Завершенная',
            'Ожидание ответа',
            'Отложенная',
            'Отмененная',
            'Доработка описания задачи',
        ];

        for ($i = 0; $i < 8; $i++) {
            $statuses[] = [
                'name' => $nameStatus[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('task_statuses')->insert($statuses);
    }
}
