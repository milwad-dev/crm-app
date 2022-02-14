<?php

namespace Mlk\User\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Mlk\User\Mail\ResetPasswordRequestMail;
use Mlk\User\Services\VerifyCodeService;

class ResetPasswordRequestNotification extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $code = VerifyCodeService::generate();
        VerifyCodeService::store($notifiable->id, $code, 120);
        return (new ResetPasswordRequestMail($code))->to($notifiable->email);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
