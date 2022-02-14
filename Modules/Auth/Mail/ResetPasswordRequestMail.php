<?php

namespace Mlk\User\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Mlk\User\Models\User;

class ResetPasswordRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    public $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code)
    {

        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('User::mails.reset-password-verify-code')->
            subject('وب آموز | بازیابی رمز عبور');
    }
}
