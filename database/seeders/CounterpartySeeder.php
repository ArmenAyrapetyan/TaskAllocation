<?php

namespace Database\Seeders;

use App\Models\Counterparty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CounterpartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Counterparty::factory(25)->create();
    }
}
