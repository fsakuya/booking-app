<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopListController extends Controller
{

  public function index()
  {
    $shops = Shop::all();    
    return view('index', compact('shops'));
  }

  public function show($id)
  {
    //
  }

  public function showReviews($id)
  {
    //
  }
}
