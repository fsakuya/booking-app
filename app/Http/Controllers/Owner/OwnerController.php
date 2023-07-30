<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Mail\UserMail;
use App\Models\Image;
use App\Models\Owner;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use InterventionImage;


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

  public function showReservations($id)
  {
    $shop = Shop::findOrFail($id);
    $reservations = $shop->reservations;

    return view('owner.reservations', compact('reservations'));
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
      'name' => 'required|string|max:20',
      'genre' => 'required|string',
      'area' => 'required|string',
      'information' => 'required|string|max:1000',
      'image' => 'nullable|image|max:2048',

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
      $fileName = uniqid(rand() . '_');
      $extension = $imageFile->extension();
      $fileNameToStore = $fileName . '.' . $extension;
      $resizedImage = InterventionImage::make($imageFile)->resize(1920, 1280)->encode();
      Storage::put('public/shops/' . $fileNameToStore, $resizedImage);
      $image = new Image();
      $image->filename = $fileNameToStore;
      $shop->image()->save($image);
    }

    return redirect()
      ->route('owner.shops')
      ->with(['message' => '店舗情報を作成しました。']);
  }


  public function edit($id)
  {
    $shop = Shop::findOrFail($id);
    // dd($shop);

    return view('owner.shopEdit', compact('shop'));
  }

  public function update(Request $request, $id)
  {
    $shop = Shop::findOrFail($id);

    $request->validate([
      'name' => 'required|max:255',
      'area' => 'required',
      'genre' => 'required',
      'information' => 'required',
      'image' => 'nullable|image|max:2048',
    ]);

    $shop->owner_id = Auth::id();  // ログインユーザーのIDを取得
    $shop->name = $request->name;
    $shop->area_id = $request->area;
    $shop->genre_id = $request->genre;
    $shop->information = $request->information;

    $shop->save();

    $imageFile = $request->image; //一時保存

    if (!is_null($imageFile) && $imageFile->isValid()) {
      // 既存の画像がある場合は削除する
      $existingImage = $shop->image;
      // dd($existingImage);
      if ($existingImage) {
        Storage::delete('public/shops/' . $existingImage->filename);
        $existingImage->delete();
      }

      // 新しい画像を保存する
      $fileName = uniqid(rand() . '_');
      $extension = $imageFile->extension();
      $fileNameToStore = $fileName . '.' . $extension;
      $resizedImage = InterventionImage::make($imageFile)->resize(1920, 1280)->encode();
      Storage::put('public/shops/' . $fileNameToStore, $resizedImage);
      $image = new Image();
      $image->filename = $fileNameToStore;
      $shop->image()->save($image);
    }

    return redirect()
      ->route('owner.shops')
      ->with(['message' => '店舗情報を更新しました。']);
  }

  public function createMail($id)
  {
    $user = User::findOrFail($id);
    // dd($user);
    return view('owner.createMail', compact('user'));
  }

  public function sendMail(Request $request)
  {

    //   $validated = $request->validate([
    //     'title' => 'required|unique:posts|max:255',
    //     'body' => 'required',
    // ]);

    // dd($request);
    $name = $request->username;
    $email = $request->useremail;
    $subject = $request->subject;
    $message = $request->message;

    // dd($name, $email, $message, $subject);

    Mail::to($request->useremail)
    ->send(new UserMail($name, $email, $message, $subject));

    $shops = Shop::where('owner_id', Auth::id())->get();

    return redirect()
      ->route('owner.shops',compact('shops'))
      ->with(['message' => 'メッセージを送信しました。']);

  }
}
