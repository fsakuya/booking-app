<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show()
  {
    $user = Auth::user();

    $favorites = $user->favorites;
    $reservedShops = $user->reservations->map(function ($reservation) {
      return [
        'shop' => $reservation->shop,
        'date' => $reservation->date,
        'time' => $reservation->time,
        'number' => $reservation->number,
      ];
    });

    // dd($user, $favorites, $reservedShops);

    return view('user.mypage', compact('user','favorites', 'reservedShops'));
  }
}
