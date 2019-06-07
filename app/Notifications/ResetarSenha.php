<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Support\Facades\Lang;

class ResetarSenha extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
            ->subject(Lang::getFromJson('Vamos criar sua nova senha?'))
            ->line(Lang::getFromJson('Você está recebendo este email porque nós recebemos um pedido para resetar a senha da sua conta.'))
            ->action(Lang::getFromJson('Trocar Senha'), url(config('app.url').route('password.reset', $this->token, false)))
            ->line(Lang::getFromJson('Este link para resetar a senha irá expirar em :count minutos.', ['count' => config('auth.passwords.users.expire')]))
            ->line(Lang::getFromJson('Se você desconhece esse pedido, então desconsidere este email.'));
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
