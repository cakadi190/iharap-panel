<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DisburseBorrowerNotification extends Notification
{
  use Queueable;

  private $message;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct($mail)
  {
    $this->message = $mail;
  }

  /**
   * Get the notification's delivery channels.
   *
   * @param  mixed  $notifiable
   * @return array
   */
  public function via($notifiable)
  {
    return ['mail'];
  }

  /**
   * Get the mail representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return \Illuminate\Notifications\Messages\MailMessage
   */
  public function toMail($notifiable)
  {
    return (new MailMessage)
      ->subject("Loan Disbursement")
      ->greeting("Hello {$this->message['fullname']}")
      ->line("We have transferred the RM ".number_format($this->message['amount'], 2)." to your preffered bank account.")
      ->line("Have a nice day!");
  }

  /**
   * Get the array representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return array
   */
  public function toArray($notifiable)
  {
    return [
      //
    ];
  }
}
