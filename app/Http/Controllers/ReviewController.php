<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
  public function create($shop)
  {
    $shop = Shop::findOrFail($shop);
    // dd($shop);
    return view('store-review', ['shop' => $shop]);
  }
  public function store(Request $request)
  {
      // 口コミをデータベースに保存する処理
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
