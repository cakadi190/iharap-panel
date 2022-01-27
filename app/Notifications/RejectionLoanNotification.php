<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RejectionLoanNotification extends Notification
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
                    ->subject('Loan Rejection Notification')
                    ->from('system@iharap.sg', config('app.name'))
                    ->line('Sorry to inform about your loan application. We aren\'t apply your loan because')
                    ->line($this->mailData['reason'])
                    ->greeting("Hello, {$this->mailData['fullname']}")
                    ->line('In the future, if you are going to register again please complete the required data according to the reason we refused your loan application.')
                    ->line('And if you want to register again, you can revisit this link bellow to register.')
                    ->action('Register Here', 'https://iharap.tri-niche.com/register')
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
