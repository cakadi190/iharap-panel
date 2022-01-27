<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BorrowerBlacklistNotification extends Notification
{
  use Queueable;

  protected $mail;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct($mail)
  {
    $this->mail = $mail;
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
      ->from('admin@dasa.web.id', config('app.name'))
      ->subject("Blacklisted Notification")
      ->greeting("Hello, {$this->mail['fullname']}")
      ->line("Loan reference number: {$this->mail['id_loan']}")
      ->line("You have a total of RM ".number_format($this->mail['amount'], 2)." overdue amount, which is accumulated over three months.")
      ->line("We strongly urge you to make immediate payment. Otherwise, other collection methos will take effect including uploading the records to CCRIS & CTOS.")
      ->line("Should you require any assistance, please whatsapp ".$this->mail['phone'].".");
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
