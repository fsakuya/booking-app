<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
  public function create($shop)
  {
    $shop = Shop::findOrFail($shop);
    // dd($shop);
    return view('store-review', ['shop' => $shop]);
  }
  public function store(Request $request, $shopId)
  {
    $request->validate([
      'rate' => 'required|integer|min:1|max:1',
      'text' => 'required|max:400',
    ]);

    $review = new Review();
    $review->user_id = Auth::id();  // ログインユーザーのIDを取得
    $review->shop_id = $shopId;  // URLから渡されたIDを使用
    $review->rating = $request->rate;
    $review->comment = $request->text;
    $review->save();

    return redirect()->route('/')->with('success', 'レビューが正常に保存されました');
  }
  
  public function update(Request $request, $review)
  {
      // 口コミの編集処理
  }
  
  public function destroy($review)
  {
      // 口コミの削除処理
  }
  
}
