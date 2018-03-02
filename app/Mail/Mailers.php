<?php

namespace App\Mail;

use Illuminate\Mail\Mailer;
use App\Models\User;
use App\Models\Auth\PasswordReset;

class Mailers {

    /**
     *
     * The Mailer instance
     *
     * @var Illuminate\Mail\Mailer
     */
    protected $mail;

    /**
     * Create a new Mailers instance.
     *
     * @param Mailer $mailer
     * @return void 
     */
    public function __construct(Mailer $mailer){
        $this->mailer = $mailer;
    }

    /**
     * send email verification
     *
     * @param User $user
     * @return void 
     */
    public function sendEmailVerification(User $user) {

        $this->mailer->to($user->email)->send(new ValidationOrder($user));
    }


    /**
     * send email password reset
     *
     * @param PasswordReset $passwordReset
     * @return void 
     */
    public function sendEmailPasswordReset(PasswordReset $passwordReset, $contest = false) {

        $this->mailer->to($passwordReset->email)->send(new PasswordResetOrder($passwordReset, $contest));    
    }

    /**
     * send email invitation
     *
     * @param User $user
     * @param PasswordReset $passwordReset
     * @return void 
     */
    public function sendEmailInvitation(User $user, PasswordReset $passwordReset) {
        $this->mailer->to($passwordReset->email)->send(new InvitationOrder($user,$passwordReset));    
    }

}