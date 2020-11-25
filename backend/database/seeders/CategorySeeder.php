<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category_name' => '哺乳類'],
            ['category_name' => '鳥類'],
            ['category_name' => '爬虫類'],
            ['category_name' => '両生類'],
            ['category_name' => '魚類'],
            ['category_name' => '虫'],
        ]);
    }
}
