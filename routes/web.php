<?php

use App\Http\Controllers\MypageController;
use App\Http\Controllers\ShopListController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\ReserveController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/dashboard', function () {
//   return view('user.dashboard');
// })->middleware(['auth:users'])->name('dashboard');

Route::get('/menu', function () {
  if (auth()->check()) {
    return view('user.menu-loggedin');
  } else {
    return view('user.menu-not-loggedin');
  }
});


Route::get('/', [ShopListController::class, 'index'])->name('list.index');
Route::get('/show/{id}', [ShopListController::class, 'show'])->name('list.show');
Route::post('/search', [ShopListController::class, 'search'])->name('list.search');

Route::middleware('auth:users')->group(function () {
  Route::post('/reserve/{id}', [ReserveController::class, 'store'])->name('reserve.store');
  Route::get('/reserve-done', function () {
    return view('user.reserve-done');
  });
  Route::delete('reserve/{id}', [ReserveController::class, 'destroy'])->name('reserve.cancel');

  Route::post('favorite/{shop}', [FavoriteController::class, 'store'])->name('favorites.store');
  Route::delete('favorite/{shop}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
  Route::get('/mypage', [MypageController::class, 'show'])->name('mypage.show');

});


require __DIR__ . '/auth.php';
