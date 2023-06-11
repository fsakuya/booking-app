<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('areas')->insert([
        [
          'name' => '東京',
        ],
        [
          'name' => '大阪',
        ],
        [
          'name' => '福岡',
        ],
      ]);
    }
}
