<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SystemRoleSeeder::class,
            GroupSeeder::class,
            TaskRoleSeeder::class,
            SourceSeeder::class,
            SpecialGroupSeeder::class,
            ProjectGroupSeeder::class,
            ProjectStatusSeeder::class,
            TaskStatusSeeder::class,
            CounterpartySeeder::class,
            UserSeeder::class,
            UserGroupSeeder::class,
            ContactSeeder::class,
            CounterpartyContactSeeder::class,
            ProjectSeeder::class,
            TaskSeeder::class,
            TaskUserSeeder::class,
        ]);
    }
}
