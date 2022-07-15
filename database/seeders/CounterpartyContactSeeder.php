<?php

namespace Database\Seeders;

use App\Models\CounterpartyContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CounterpartyContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CounterpartyContact::factory(40)->create();
    }
}
