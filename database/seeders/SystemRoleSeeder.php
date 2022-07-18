<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $system_roles = [];

        $nameRole = [
            'Администратор',
            'Пользователь'
        ];

        for ($i = 0; $i < 2; $i++){
            $system_roles[] = [
                'name' => $nameRole[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('system_roles')->insert($system_roles);
    }
}
