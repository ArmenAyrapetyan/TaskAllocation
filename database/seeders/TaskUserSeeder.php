<?php

namespace Database\Seeders;

use App\Models\TaskUser;
use Illuminate\Database\Seeder;

class TaskUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskUser::factory(150)->create();
    }
}
