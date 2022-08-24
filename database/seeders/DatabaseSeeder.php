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
            AccessRoleSeeder::class,
            SourceSeeder::class,
            SpecialGroupSeeder::class,
            ProjectGroupSeeder::class,
            ProjectStatusSeeder::class,
            TaskStatusSeeder::class,
            CounterpartySeeder::class,
            UserSeeder::class,
            UserGroupSeeder::class,
            ContactSeeder::class,
            ProjectSeeder::class,
            TaskSeeder::class,
            MessagesSeeder::class,
            ProjectUsersSeeder::class,
            AccessUserSeeder::class,
            AccessGroupSeeder::class,
            TimeSpendSeeder::class
        ]);
    }
}
