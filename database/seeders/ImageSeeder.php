<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ImageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('images')->insert([
      [
        'shop_id' => 1,
        'filename' => 'sushi.jpg',
      ],
      [
        'shop_id' => 2,
        'filename' => 'yakiniku.jpg',
      ],
      [
        'shop_id' => 3,
        'filename' => 'izakaya.jpg',
      ],
      [
        'shop_id' => 4,
        'filename' => 'italian.jpg',
      ],
      [
        'shop_id' => 5,
        'filename' => 'ramen.jpg',
      ],
      [
        'shop_id' => 6,
        'filename' => 'yakiniku.jpg',
      ],
      [
        'shop_id' => 7,
        'filename' => 'italian.jpg',
      ],
      [
        'shop_id' => 8,
        'filename' => 'ramen.jpg',
      ],
      [
        'shop_id' => 9,
        'filename' => 'izakaya.jpg',
      ],
      [
        'shop_id' => 10,
        'filename' => 'sushi.jpg',
      ],
      [
        'shop_id' => 11,
        'filename' => 'yakiniku.jpg',
      ],
      [
        'shop_id' => 12,
        'filename' => 'yakiniku.jpg',
      ],
      [
        'shop_id' => 13,
        'filename' => 'izakaya.jpg',
      ],
      [
        'shop_id' => 14,
        'filename' => 'sushi.jpg',
      ],
      [
        'shop_id' => 15,
        'filename' => 'ramen.jpg',
      ],
      [
        'shop_id' => 16,
        'filename' => 'izakaya.jpg',
      ],
      [
        'shop_id' => 17,
        'filename' => 'sushi.jpg',
      ],
      [
        'shop_id' => 18,
        'filename' => 'yakiniku.jpg',
      ],
      [
        'shop_id' => 19,
        'filename' => 'italian.jpg',
      ],
      [
        'shop_id' => 20,
        'filename' => 'sushi.jpg',
      ],
    ]);
  }
}
