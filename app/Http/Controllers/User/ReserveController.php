<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ReserveController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:users');
  }
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, $id)
  {
    // dd($request);
    $request->validate([
      'date' => 'required|date',
      'time' => 'required|date_format:H:i',
      'number' => 'required|integer|min:1',
    ]);

    $reservation = new Reservation();

    $reservation->user_id = Auth::id();  // ログインユーザーのIDを取得
    $reservation->shop_id = $id;  // URLから渡されたIDを使用
    $reservation->date = $request->date;
    $reservation->time = $request->time;
    $reservation->number = $request->number;

    // // Convert the reservation information to a string
    // $reservation_info = "User ID: {$reservation->user_id}, Shop ID: {$reservation->shop_id}, Date: {$reservation->date}, Time: {$reservation->time}, Number: {$reservation->number}";

    // // Generate QR code with the reservation information
    // $qr_code = QrCode::format('png')->size(100)->generate($reservation_info);
    // // Save the QR code
    // $path = "public/qr-codes/reservation_{$reservation->user_id}_{$reservation->shop_id}.png";
    // Storage::put($path, $qr_code);

    // $reservation->codename = $path;

    $reservation->save();

    return redirect('reserve-done');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function showChangeForm($id)
  {
    $reservation = Reservation::find($id);
    return view('user.reserve-change', compact('reservation'));
  }

  public function change(Request $request, $id)
  {
    $reservation = Reservation::find($id);
    $reservation->date = $request->input('date');
    $reservation->time = $request->input('time');
    $reservation->number = $request->input('number');
    $reservation->save();
    return redirect()->route('user.mypage.show')->with('success', '予約が変更されました。');
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Reservation::findOrFail($id)->delete();

    return redirect()
      ->route('user.mypage.show')
      ->with('success', '予約をキャンセルしました。');
  }
}
