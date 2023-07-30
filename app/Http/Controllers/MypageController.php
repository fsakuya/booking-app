<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Shop;
use App\Models\User;
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
    $reservedShops = $user->reservations()->whereNull('checkouted')->get()->map(function ($reservation) {
      return [
        'id' => $reservation->id,
        'shop' => $reservation->shop,
        'date' => $reservation->date,
        'time' => $reservation->time,
        'number' => $reservation->number,
      ];
    });


    return view('user.mypage', compact('user', 'favorites', 'reservedShops'));
  }

  public function showVisitedShops(Request $request)
  {
    $visitedShops = Auth::user()->reservations->where('visited', true)->where('checkouted', true);
    return view('user.mypage-visited', compact('visitedShops'));
  }
  public function showReviewShops(Request $request, $id)
  {
    $reviewShop = Shop::findOrFail($id);
    return view('user.mypage-review', compact('reviewShop'));
  }

  public function storeReview(Request $request, $id)
  {

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

  public function showCheckoutForm(Request $request)
  {
    $checkoutReservations = Auth::user()->reservations->where('visited', true)->where('checkouted', false);
    return view('user.checkout', compact('checkoutReservations'));
  }


  public function processCheckout(Request $request, $id)
  {
    $user = User::findOrFail(Auth::id());

    $line_items = [
      [
        'price_data' => [
          'currency' => 'jpy', // 通貨を円に設定
          'product_data' => [
            'name' => 'お支払い金額', // 商品名やサービス名を設定（適宜変更してください）
          ],
          'unit_amount' => $request->price, // 金額をそのまま設定（Stripeでは日本円は小数点以下を扱わないため）
        ],
        'quantity' => 1, // 数量
      ],
    ];

    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

    $session = \Stripe\Checkout\Session::create([
      'payment_method_types' => ['card'],
      'line_items' => [$line_items],
      'mode' => 'payment',
      'success_url' => route('user.mypage.checkoutSuccess'),//予約idを渡す
      'cancel_url' => route('user.mypage.show'),
      'metadata' => [
        'reservation_id' => $id,
      ],
    ]);

    $publicKey = env('STRIPE_PUBLIC_KEY');

    return view('user.checkout-process', compact('session', 'publicKey'));
  }
}
