<?php

namespace App\Listeners;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class SendEmailConfirmation extends VerifyEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Get the verify email notification mail message for the given URL.
     *
     * @param  string  $url
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject(Lang::get('Este es tu código de verificación.'))
            ->line(Lang::get('Este es tu código de verificación. Ingrésalo para continuar con el registro.'))
            ->action(Lang::get('Presiona para verificar tu correo electrónico'), $url)
            ->line(Lang::get('Este código es único y no lo debes compartir.'));
    }
}
