<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Exception\UnexpectedValueException;
use Stripe\Stripe;
use Stripe\Webhook;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Log;

class StripeWebhookController extends Controller
{
  public function webhook()
  {
    Stripe::setApiKey(config('services.stripe.secret')); //envに設定しているのを引っ張っている
    $endpoint_secret = 'whsec_43a11e88c6a95edadd1f197320edfbd04ef8799f9a985bd71412fdbb78ca3396'; //Stripe CLIを起動するときに出てくる（あとで解説します）

    $payload = @file_get_contents('php://input');
    $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    try {
      $event = Webhook::constructEvent(
        $payload,
        $sig_header,
        $endpoint_secret
      );
    } catch (UnexpectedValueException $e) {
      Log::error('Webhook Error: ' . $e->getMessage()); // <- エラーロギング
      http_response_code(400);
      exit();
    } catch (SignatureVerificationException $e) {
      Log::error('Webhook Error: ' . $e->getMessage()); // <- エラーロギング
      http_response_code(400);
      exit();
    }

    if ($event->type == 'checkout.session.completed') {
      $session = $event->data['object'];
      $this->handle_checkout_session($session); //次に作成する
    }

    http_response_code(200);
  }

  public function handle_checkout_session($session)
  {
    Log::info('Stripe session data: ', ['session' => $session]);
    // // 支払いが成功した場合（イベントタイプを確認してください）
    // if ($request->type == 'checkout.session.completed') {
    //   $session = $request->data['object'];

    // ShopのIDを取得します。このIDはStripe Checkoutセッションのメタデータに保存されている必要があります。
    $shopId = $session['metadata']['shop_id'];

    // Shopを取得し、checkoutedフィールドを更新します。
    $shop = Shop::findOrFail($shopId);
    $shop->reservedShops->checkouted = true;

    $shop->save();

    // レスポンスをStripeに返します。これは成功のHTTPステータスコード200でなければなりません。
    return response()->json(['received' => true]);
  }
}
