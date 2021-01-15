<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OldVotingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('old_votings')->insert([
            ['tag1_id' => 1, 'tag2_id' => 2, 'tag1_num' => 32, 'tag2_num' => 14, 'creature_id' => 1],
            ['tag1_id' => 1, 'tag2_id' => 3, 'tag1_num' => 28, 'tag2_num' => 9, 'creature_id' => 2],
        ]);
    }
}
