<?php

namespace App\Http\Controllers;

use App\Models\Image;
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
    dd($request, $shopId);
      $data = $request->validate([
          'rating' => 'required|integer|min:1|max:5',
          'text' => 'nullable|string|max:400',
          'images.*' => 'nullable|image|max:2048',
      ]);
  
      // データベースに口コミ情報を保存
      $review = new Review([
          'shop_id' => $shopId,
          'user_id' => Auth::id(),
          'rating' => $data['rate'],
          'text' => $data['text'],
      ]);
      $review->save();
  
      // 画像を保存
      if ($request->hasFile('images')) {
          foreach ($request->file('images') as $image) {
              $path = $image->store('reviews', 'public');
  
              // 画像情報をデータベースに保存
              $reviewImage = new Image();
              $reviewImage->path = $path;  // 画像のパスを保存
              $reviewImage->review_id = $review->id;  // 口コミIDを関連付ける
              $reviewImage->save();
          }
      }
  
      return redirect()->route('/')->with('success', '口コミを投稿しました！');
  }
  
  public function show($id)
  {
    $shop = Shop::findOrFail($id);
    $reviews = $shop->reviews;
    
    return view('shops-reviews', compact('shop', 'reviews'));
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
