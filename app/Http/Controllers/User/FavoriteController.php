<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
  public function store(Shop $shop)
  {
    Auth::user()->favorites()->attach($shop->id);
    return response()->json(['status' => 'success']);
  }

  public function destroy(Shop $shop)
  {
    Auth::user()->favorites()->detach($shop->id);
    return response()->json(['status' => 'success']);
  }
}
