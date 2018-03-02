<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Auth\PasswordReset;
use App\Models\User;

class InvitationOrder extends Mailable{
    
    use Queueable, SerializesModels;

    /**
     *  
     *  the subject the message
     *  @var string
     */
    public $subject = 'Invitación';

    /**
     *  
     *  the PasswordReset instance
     *  @var PasswordReset
     */
    public $passwordReset;

    /**
     *  
     *  the User instance
     *  @var User
     */
    public $user;

    /**
     * Create a new message instance.git
     * @param User $user
     * @param PasswordReset $passwordReset
     */
    public function __construct(User $user, PasswordReset $passwordReset){

        $this->user = $user;
        $this->passwordReset = $passwordReset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){

        return $this->view('emails.invitation');
    }

}