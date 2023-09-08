<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReviewsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('reviews')->insert([
      [
        'user_id' => '1',
        'shop_id' => '1',
        'rating' => rand(1, 5),
        'comment' => Str::random(50),
        'image_path' => null,
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),

      ],
    ]);
  }
}