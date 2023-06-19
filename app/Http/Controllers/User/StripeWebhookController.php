<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class StripeWebhookController extends Controller
{
  public function handleWebhook(Request $request)
  {
    // 支払いが成功した場合（イベントタイプを確認してください）
    if ($request->type == 'checkout.session.completed') {
      $session = $request->data['object'];

      // ShopのIDを取得します。このIDはStripe Checkoutセッションのメタデータに保存されている必要があります。
      $shopId = $session['metadata']['shop_id'];

      // Shopを取得し、checkoutedフィールドを更新します。
      $shop = Shop::findOrFail($shopId);
      $shop->reservedShops->checkouted = true;
      $shop->save();
    }

    // レスポンスをStripeに返します。これは成功のHTTPステータスコード200でなければなりません。
    return response()->json(['received' => true]);
  }
}
