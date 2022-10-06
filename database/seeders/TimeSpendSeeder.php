<?php

namespace Database\Seeders;

use App\Models\AccessUser;
use App\Models\Task;
use Carbon\Carbon;
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
            $day = random_int(1,28);
            $month = random_int(1,12);
            $input[] = [
                'access_user_id' => $id_access[$i],
                'message' => Lorem::text(50),
                'time_spend' => random_int(600,1800),
                'created_at' => date('Y-m-d H:i:s', strtotime("2022-$month-$day")),
                'updated_at' => date('Y-m-d H:i:s', strtotime("2022-$month-$day")),
            ];
        }

        DB::table('time_spends')->insert($input);
    }
}
