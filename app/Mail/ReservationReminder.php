<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $reservationDate;
    public $reservationTime;
    public $reservationPeople;
    public $reservationStore;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $reservationDate, $reservationTime, $reservationPeople, $reservationStore)
    {
        $this->userName = $userName;
        $this->reservationDate = $reservationDate;
        $this->reservationTime = $reservationTime;
        $this->reservationPeople = $reservationPeople;
        $this->reservationStore = $reservationStore;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('example@example.com', 'Example')
      ->subject('Your reservation reminder')
      ->view('owner.reservationReminder')  // 予約確認メールのビューファイル
      ->with([
        'userName' => $this->userName,
        'reservationDate' => $this->reservationDate,
        'reservationTime' => $this->reservationTime,
        'reservationPeople' => $this->reservationPeople,
        'reservationStore' => $this->reservationStore,
      ]);
    }
}
