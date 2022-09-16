<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use App\Models\UserGroup;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $groupsId = Group::select('id')->get()->toArray();
        $insert = [];

        foreach ($users as $user){
            $insert[] = [
                'user_id' => $user->id,
                'group_id' => $groupsId[random_int(0, count($groupsId) - 1)]['id'],
            ];
        }

        DB::table('user_groups')->insert($insert);
    }
}
