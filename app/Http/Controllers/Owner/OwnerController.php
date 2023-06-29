<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Owner;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OwnerController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:owners');
  }

  public function showShops()
  {
    $owner = Auth::user();
    $shops = $owner->shop;
    // dd($shops);

    return view('owner.shops', compact('shops'));
  }

  public function showReservations()
  {
    return view('owner.reservations');
  }

  public function showCode()
  {
    return view('owner.code');
  }

  public function create()
  {
    return view('owner.shopCreate');
  }
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:50',
      'genre' => 'required',
      'area' => 'required',
      'information' => 'required|string|max:1000',
    ]);
    $shop = new Shop();

    $shop->owner_id = Auth::id();  // ログインユーザーのIDを取得
    $shop->name = $request->name;
    $shop->area_id = $request->area;
    $shop->genre_id = $request->genre;
    $shop->information = $request->information;

    $shop->save();

    $imageFile = $request->image; //一時保存
    if (!is_null($imageFile) && $imageFile->isValid()) {
      $fileNameToStore = Storage::putFile('public/shops', $imageFile);
      $image = new Image();
      $image->filename = $fileNameToStore;
      $shop->image()->save($image);
    }


    return redirect()
      ->route('owner.shops')
      ->with(['message' => '店舗情報を作成しました。']);
  }


  public function edit()
  {
    return view('owner.shopEdit');
  }
}
