<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Reservation;
use App\Mail\ReservationReminder;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;

class SendReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reservation reminders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      $today = Carbon::now()->format('Y-m-d');

      $reservations = Reservation::where('date', $today)->get();

      foreach ($reservations as $reservation) {
        $user = $reservation->user;
        Mail::to($user->email)->send(
            new ReservationReminder(
                $user->name,
                $reservation->date,
                $reservation->time,
                $reservation->number,
                $reservation->shop->name
        ));
      }

      return 0;
    }
}
