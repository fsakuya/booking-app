<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('genres')->insert([
      [
        'name' => 'イタリアン',
      ],
      [
        'name' => 'ラーメン',
      ],
      [
        'name' => '寿司',
      ],
      [
        'name' => '焼肉',
      ],
      [
        'name' => '居酒屋',
      ],
    ]);
  }
}
