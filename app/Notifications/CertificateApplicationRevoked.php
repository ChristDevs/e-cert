<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Entities\Certificate;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CertificateApplicationRevoked extends Notification
{
    use Queueable;
    /**
     * Certificate model
     *
     * @var Certificate
     **/
    public $cert;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Certificate $certificate)
    {
        $this->cert = $certificate;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
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
                    ->error()
                    ->subject("Your application for {$this->cert->type} was revoked")
                    ->line($this->cert->approval_notes)
                    ->action('View On Site', route("{$this->cert->type}.application", $this->cert->id))
                    ->line('Thank you for using '.config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'alert' => 'danger',
            'type' => $this->cert->type,
            'certificate' => $this->certificate->id,
            'message' => $this->cert->approval_notes,
            'title' => "Your application for {$this->cert->type} was revoked",
        ];
    }
}
