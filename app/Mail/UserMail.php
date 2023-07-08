<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
  use Queueable, SerializesModels;

  public $name;
  public $email;
  public $message;
  public $subject;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($name, $email, $message, $subject)
  {
    $this->name = $name;
    $this->email = $email;
    $this->message = $message;
    $this->subject = $subject;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->from('example@example.com', 'Example')
      ->subject($this->subject)
      ->view('owner.sendMail')
      ->with([
        'name' => $this->name,
        'userMessage' => $this->message,
      ]);
  }
}
