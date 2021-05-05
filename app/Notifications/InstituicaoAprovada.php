<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InstituicaoAprovada extends Notification
{
    use Queueable;

    public $email;
    public $nome;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email, $nome)
    {
        $this->email = $email;
        $this->nome = $nome;
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
                    ->from($this->email, $this->nome)
                    ->greeting('Olá!')
                    ->subject('Aprovação da Instituição')
                    ->line("A instituição {$this->nome} foi aprovada.")
                    // ->action('Acessar o site', url('/'))
                    ->line('Obrigado por usar nosso sistema!');
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
