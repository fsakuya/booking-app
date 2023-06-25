<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:owners');
  }

  public function showShops()
  {
    $owner = Auth::user();
    $shops = $owner->shop;
    // dd($shops);

    return view('owner.shops', compact('shops'));
  }

  public function showReservations()
  {
    return view('owner.reservations');
  }

  public function showCode()
  {
    return view('owner.code');
  }

  public function create()
  {
    return view('owner.shopCreate');
  }
  public function edit()
  {
    return view('owner.shopEdit');
  }
}
