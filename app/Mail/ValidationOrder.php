<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;


class ValidationOrder extends Mailable
{

    use Queueable, SerializesModels;

    /**
     *  
     *  the subject the message
     *  @var string
     */

    /**
     *  
     *  the User instance
     *  @var User
     */
    public $user;

    /**
     * Create a new message instance.
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     * @return $this
     */
    public function build()
    {
        $l = app('translator')->getLocale();
        if ($l == 'en') {
            $subject = 'Confirm your account';
        }
        else {
            $subject = 'Confirmación de la cuenta';
        }
        return $this->view('emails.verify', ['lang' => $l])
            ->subject($subject);

    }
}