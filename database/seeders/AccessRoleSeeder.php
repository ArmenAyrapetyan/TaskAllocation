<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accessRoles = [];

        $nameRole = [
            'Постановщик',
            'Аудитор',
            'Исполнитель'
        ];

        for ($i = 0; $i < 3; $i++){
            $accessRoles[] = [
                'name' => $nameRole[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('access_roles')->insert($accessRoles);
    }
}
