<?php

use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopListController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\ReserveController;
use App\Http\Controllers\User\StripeWebhookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//   return view('user.welcome');
// });


Route::get('/register-done', function () {
  return view('user.register-done');
});

//口コミページ表示
Route::get('/reviews/create/{shop}', [ReviewController::class, 'create'])->name('reviews.create');

//口コミ追加
Route::post('/reviews/store/{id}', [ReviewController::class, 'store'])->name('reviews.store');

//画像アップロード
Route::post('/upload', [DropzoneController::class, 'store'])->name('dropzone.store');

//口コミ編集
Route::put('/reviews/{reviews}', [ReviewController::class, 'update'])->name('reviews.update');

//口コミ削除
Route::delete('/reviews/', [ReviewController::class, 'delete'])->name('reviews.delete');




Route::get('/menu', function () {
  if (auth()->check()) {
    return view('user.menu-loggedin');
  } else {
    return view('user.menu-not-loggedin');
  }
});


Route::get('/', [ShopListController::class, 'index'])->name('list.index');
Route::get('/show/{id}', [ShopListController::class, 'show'])->name('list.show');
Route::get('/reviews/{id}', [ShopListController::class, 'showReviews'])->name('list.review');
Route::post('/search', [ShopListController::class, 'search'])->name('list.search');
Route::get('/sort', [ShopListController::class, 'sort'])->name('list.sort');



Route::middleware('auth:users')->group(function () 
{
  
Route::get('/dashboard', function () {
  return view('user.dashboard');
});
  Route::get('/mypage', [MypageController::class, 'show'])->name('mypage.show');
  Route::get('/mypage/visited', [MypageController::class, 'showVisitedShops'])->name('mypage.showVisitedShops');
  Route::get('/mypage/review/{id}', [MypageController::class, 'showReviewShops'])->name('mypage.showReviewShops');
  Route::post('/mypage/review/{id}', [MypageController::class, 'storeReview'])->name('mypage.storeReview');

  Route::get('/mypage/checkout', [MypageController::class, 'showCheckoutForm'])->name('mypage.showCheckoutForm');
  Route::post('/mypage/checkout/process/{id}', [MypageController::class, 'processCheckout'])->name('mypage.processCheckout');
  Route::get('/mypage/checkout/success', function () {
    return view('user.checkout-success');
  })->name('mypage.checkoutSuccess');



  Route::post('/reserve/{id}', [ReserveController::class, 'store'])->name('reserve.store');
  Route::get('/reserve-done', function () {
    return view('user.reserve-done');
  });
  Route::delete('reserve/cancel/{id}', [ReserveController::class, 'destroy'])->name('reserve.cancel');
  Route::get('/reserve/change/{id}', [ReserveController::class, 'showChangeForm'])->name('reserve.changeForm');
  Route::put('/reserve/change/{id}', [ReserveController::class, 'change'])->name('reserve.change');


  Route::post('favorite/{shop}', [FavoriteController::class, 'store'])->name('favorites.store');
  Route::delete('favorite/{shop}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

});

Route::post('/stripe/webhook', [StripeWebhookController::class,'webhook']);






require __DIR__ . '/auth.php';
