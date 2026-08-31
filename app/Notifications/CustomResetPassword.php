<?php

namespace App\Notifications;

use Filament\Facades\Filament;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPassword extends ResetPasswordNotification
{
    /**
     * Build the reset URL specifically for Filament if active.
     */
    protected function resetUrl($notifiable): string
    {
        if (class_exists(Filament::class) && Filament::getCurrentPanel()) {
            return Filament::getResetPasswordUrl($this->token, $notifiable);
        }

        return route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ]);
    }

    /**
     * Build the custom SafeNest HTML mail.
     */
    public function toMail($notifiable): MailMessage
    {
        $url = $this->resetUrl($notifiable);

        return (new MailMessage)
            ->subject('Reset Your Password - SafeNest')
            ->view('emails.password-reset', [
                'url' => $url,
                'user' => $notifiable,
                'count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire', 60),
            ]);
    }
}