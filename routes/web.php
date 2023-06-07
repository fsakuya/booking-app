<?php

use App\Http\Controllers\ShopListController;
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

Route::get('/dashboard', function () {
  return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');


Route::get('/', [ShopListController::class, 'index'])->name('list.index');
Route::get('/{shop}', [ShopListController::class, 'show'])->name('list.show');
Route::get('/reviews/{shop}', [ShopListController::class, 'showReviews'])->name('list.reviews');





require __DIR__ . '/auth.php';
