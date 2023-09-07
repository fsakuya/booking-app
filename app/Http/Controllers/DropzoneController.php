<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Review;
use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    public function store(Request $request)
    {
    // 画像のバリデーション
    $request->validate([
      'file' => 'required|image|max:2048', // fileという名前はDropzoneのデフォルトのものです。
  ]);

  // 画像を保存
  $path = $request->file('file')->store('uploads', 'public');

  // 画像情報をデータベースに保存
  $image = new Review();
  $image->image_path = $path;
  $image->save();

  // 画像のIDやパスをレスポンスとして返す
  return response()->json([
      'id' => $image->id,
      'path' => $path,
  ]);
}
    }

