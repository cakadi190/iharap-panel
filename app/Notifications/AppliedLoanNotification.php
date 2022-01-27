<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppliedLoanNotification extends Notification
{
  use Queueable;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct($data)
  {
    $this->mailData = $data;
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
      ->subject('Loan Applied Notification')
      ->greeting("Hello, {$this->mailData['fullname']}")
      ->line("Good Day! We inform to you about loan application currently change to \"APPLIED\" at RM" . number_format($this->mailData['amount'], 2))
      ->line("We will need you to complete the E-Mandate Process before the cash disbursement.")
      ->line("Please click on the below URL to authorize the E-Mandate process :")
      ->action('Authorize E-Mandate', $this->mailData['urlAuth'])
      ->line("If any question about e-Mandate and disbursment, please contact us or email us at admin@iharap.sg")
      ->line('Thank you');
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
