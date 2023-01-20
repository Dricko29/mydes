<?php

namespace App\Notifications;

use App\Models\LayananMandiri;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisterLayananMandiriEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $layananMandiri;
    public function __construct(LayananMandiri $layananMandiri)
    {
        $this->layananMandiri = $layananMandiri;
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
                    ->greeting('Hello, ' . $this->layananMandiri->nama)
                    ->line('Data anda sedang diverifkasi oleh petugas')
                    ->line('Akan ada pemberitahuan selanjutnya jika sudah terverifikasi')
                    ->action('Website', url('/'))
                    ->line('Thank you for using our application!')
                    ->line('Jangan lupa email dan password anda saat mendaftar!');
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