<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Auth\PasswordReset;


class PasswordResetOrder extends Mailable
{

    use Queueable, SerializesModels;

    /**
     *  
     *  the subject the message
     *  @var string
     */

    /**
     *  
     *  the PasswordReset instance
     *  @var PasswordReset
     */
    public $passwordReset;


    public $contest;

    /**
     * Create a new message instance.
     * @return void
     */
    public function __construct(PasswordReset $passwordReset) {
        $this->passwordReset = $passwordReset;
        $this->contest = $contest;
    }

    /**
     * Build the message.
     * @return $this
     */
    public function build() {
        
        $lang = app('translator')->getLocale();
        $subject = $lang == 'en' ? 'Recover your password' : 'Recupera tu contraseña';
        return $this->view('emails.reset', ['lang' => $lang])
                    ->subject($subject);

    }
}