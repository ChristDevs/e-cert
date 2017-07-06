<?php

namespace App\Notifications;

use App\Channels\SMSChannel;
use Illuminate\Bus\Queueable;
use App\Entities\Certificate;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CertificateProcessed extends Notification
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
    public function via()
    {
        return ['database','mail', SMSChannel::class];
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
                    ->greeting('Hallo! '.$notifiable->name)
                    ->subject("Your application for {$this->cert->type} certificate has been processed")
                    ->line($this->cert->process_notes)
                    ->action('View On Site', route("{$this->cert->type}.application", $this->cert->id))
                    ->line('Thank you for using '.config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray()
    {
        return [
            'alert' => 'primary',
            'type' => $this->cert->type,
            'certificate' => $this->cert->id,
            'title' => "Your application for {$this->cert->type} certificate was processed",
            'message' => $this->cert->process_notes,
            'action' =>  'processed'
            //
        ];
    }
    /**
     * Get the sms representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    public function toSms($notifiable) : string
    {
        return  "Your application for {$this->cert->type} certificate was processed successfully. You will be notified again when approved";
    }
}
