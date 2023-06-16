<?php

namespace App\Http\Controllers;

use App\Models\Review;
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
        'id' => $reservation->id,
        'shop' => $reservation->shop,
        'date' => $reservation->date,
        'time' => $reservation->time,
        'number' => $reservation->number,
      ];
    });

    // dd($user, $favorites, $reservedShops);

    return view('user.mypage', compact('user', 'favorites', 'reservedShops'));
  }

  public function showVisitedShops(Request $request) {
    $visitedShops = Auth::user()->reservations->where('visited', true);
    // dd($visitedShops);
    return view('user.mypage-visited', compact('visitedShops'));
  }

  public function storeReview(Request $request, $id){
    // dd($request,$id);

    $request->validate([
      'number' => 'required|integer|between:1,5',
      'text' => 'required|string|max:255',
    ]);

    $review = new Review();

    $review->user_id = Auth::id();  // ログインユーザーのIDを取得
    $review->shop_id = $id;  // URLから渡されたIDを使用
    $review->rating = $request->number;
    $review->comment = $request->text;

    $review->save();

    return redirect('/mypage/visited')->with('success', '評価を登録しました。');
  }
}
