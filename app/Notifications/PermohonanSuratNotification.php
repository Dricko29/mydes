<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PermohonanSuratNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $permohonanSurat;
    public function __construct($permohonanSurat)
    {
        $this->permohonanSurat = $permohonanSurat;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'penduduk_id' => $this->permohonanSurat->penduduk_id,
            'surat_id' => $this->permohonanSurat->surat_id,
            'title' => 'Permohonan Surat',
            'link' => '/site/permohonanSurat',
            'messages' => $this->permohonanSurat->penduduk->nama.' melakukan permohonan surat '.$this->permohonanSurat->surat->nama,
        ];
    }
}