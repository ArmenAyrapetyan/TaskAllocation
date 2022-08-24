<?php

namespace Database\Seeders;

use App\Models\AccessUser;
use App\Models\Task;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeSpendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [];

        $id_access = AccessUser::where('accessable_type', Task::class)->pluck('id');

        for ($i = 0; $i < count($id_access); $i++){
            $input[] = [
                'access_user_id' => $id_access[$i],
                'message' => Lorem::text(50),
                'time_spend' => random_int(0,150),
            ];
        }

        DB::table('time_spends')->insert($input);
    }
}
