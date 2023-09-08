<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopListController extends Controller
{

  public function index()
  {
    
    $shops = Shop::all();
    $areas = Area::all();
    $genres = Genre::all();

    return view('index', compact('shops', 'areas', 'genres'));
  }

  public function search(Request $request)
  {
    // dd($request);
    $area = $request->input('area');
    $genre = $request->input('genre');
    $shop_name = $request->input('shop_name');

    $shops = Shop::query()
      ->when($area, function ($query, $area) {
        return $query->where('area_id', $area);
      })
      ->when($genre, function ($query, $genre) {
        return $query->where('genre_id', $genre);
      })
      ->when($shop_name, function ($query, $shop_name) {
        return $query->where('name', 'like', '%' . $shop_name . '%');
      })
      ->get();
    $areas = Area::all();
    $genres = Genre::all();

    return view('index', compact('shops', 'areas', 'genres'));
  }


  public function show($id)
  {
    $shop = Shop::findOrFail($id);
    $reviews = $shop->reviews;
    
    return view('shops-detail', compact('shop', 'reviews'));
  }

  public function showReviews($id)
  {
    $shop = Shop::findOrFail($id);
    $reviews = $shop->reviews;
    
    return view('shops-reviews', compact('shop', 'reviews'));
  }

  public function sort(Request $request)
{
    $sortOption = $request->input('sort', 'random');

    switch ($sortOption) {
        case 'high':
            $shops = Shop::withCount('reviews')
            ->orderByDesc('reviews_count')
            ->orderByDesc('average_rating')  // 評価の平均値での並び替えを想定
            ->get();
            break;
        case 'low':
            $shops = Shop::withCount('reviews')
                    ->orderBy('reviews_count')
                    ->orderBy('average_rating')
                    ->get();
            break;
        case 'random':
        default:
            $shops = Shop::inRandomOrder()->get();
            break;
    }
    $areas = Area::all();
    $genres = Genre::all();

    return view('index', compact('shops', 'areas', 'genres'));

}

}
