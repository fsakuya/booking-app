<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailCreateRequest;
use App\Http\Requests\ShopCreateRequest;
use App\Mail\UserMail;
use App\Models\Image;
use App\Models\Owner;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use InterventionImage;
use League\Csv\Reader;



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
  public function store(ShopCreateRequest $request)
  {

    $shop = new Shop();

    $shop->owner_id = Auth::id(); // ログインユーザーのIDを取得
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

    $shop->owner_id = Auth::id(); // ログインユーザーのIDを取得
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

  public function sendMail(EmailCreateRequest $request)
  {

    $name = $request->username;
    $email = $request->useremail;
    $subject = $request->subject;
    $message = $request->message;

    Mail::to($request->useremail)
      ->send(new UserMail($name, $email, $message, $subject));

    $shops = Shop::where('owner_id', Auth::id())->get();

    return redirect()
      ->route('owner.shops', compact('shops'))
      ->with(['message' => 'メッセージを送信しました。']);

  }

  public function importForm()
  {
    return view('owner.import');
  }

  public function import(Request $request)
  {
    dd($request);
    // ファイルの存在と拡張子の確認
    $file = $request->file('csv_file');
    if (!$file->isValid() || !in_array($file->getClientOriginalExtension(), ['csv'])) {
      return back()->withErrors('CSVファイルをアップロードしてください');
    }

    $csv = Reader::createFromPath($file->path());
    $csv->setHeaderOffset(0);
    $records = $csv->getRecords();

    $areaMap = [
      '東京都' => 1,
      '大阪府' => 2,
      '福岡県' => 3
    ];

    $genreMap = [
      '寿司' => 1,
      '焼肉' => 2,
      'イタリアン' => 3,
      '居酒屋' => 4,
      'ラーメン' => 5
    ];

    foreach ($records as $record) {
      // バリデーションの実装
      $validator = Validator::make($record, [
        '店舗名' => 'required|max:50',
        '地域' => 'required|in:東京都,大阪府,福岡県',
        'ジャンル' => 'required|in:寿司,焼肉,イタリアン,居酒屋,ラーメン',
        '店舗概要' => 'required|max:400',
        '画像URL' => 'required|mimes:jpeg,png'
      ]);

      if ($validator->fails()) {
        return back()->withErrors($validator);
      }

      // 地域とジャンルの文字列をIDに変換
      $areaId = $areaMap[$record['地域']] ?? null;
      $genreId = $genreMap[$record['ジャンル']] ?? null;

      Shop::create([
        'owner_id' => Auth::id(),
        'area_id' => $areaId,
        'genre_id' => $genreId,
        'name' => $record['店舗名'],
        'informatin' => $record['店舗概要'],
      ]);
    }

    $image_path = $request->file()->store('public/shops/');
    $image = new Image();
    $image->filename = $image_path;
    $image->shop_id = Shop::id();

    return back()->with('success', '店舗情報のインポートが完了しました。');
  }
}