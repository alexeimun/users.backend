<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\UserInvalid;
use App\Http\Controllers\Controller;
use App\Mail\Mailers;
use App\Repositories\Auth\PasswordResetRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller {

    /**
     * The users repository.
     *
     * @var \App\Repositories\Contracts\UserRepositoryInterface
     */
    protected $users;

    /**
     * The password reset repository.
     *
     * @var \App\Repositories\Auth\PasswordResetRepository
     */
    protected $passwordResets;

    /**
     * Create a new controller instance.
     *
     * @param \App\Repositories\Contracts\UserRepositoryInterface $users
     * @param \App\Repositories\Auth\PasswordResetRepository $passwordResets
     * @return void
     */
    public function __construct(UserRepository $users, PasswordResetRepository $passwordResets) {

        $this->users = $users;
        $this->passwordResets = $passwordResets;
    }

    /**
     * send email for update password
     *
     * @param \App\Mail\Mailers $mailers
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\App\Exceptions\UserInvalid
     */
    public function sendResetLinkEmail(Mailers $mailers, Request $request) {

        $this->validate($request, ['email' => 'required|max:255']);

        $user = $this->users->findBy('email', $request->input('email'));

        if(is_null($user)) {
            throw new UserInvalid;
        }

        $passwordReset = $this->passwordResets->createToken($user->email);

        if($request->input('invitation')) {
            $mailers->sendEmailInvitation($user, $passwordReset);
        } else {
            $mailers->sendEmailPasswordReset($passwordReset, $request->input('contest'));
        }

        return response()->json(['message' => 'email send']);
    }

    /**
     * reset password for user with email
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reset(Request $request) {

        $this->validate($request, ['token' => 'required', 'password' => 'required|string|confirmed|min:6',]);

        $email = $this->passwordResets->findEmailbyToken($request->input('token'));

        $this->users->updatePassword($email, $request->input('password'));

        return response()->json(['message' => 'password updated']);
    }

}