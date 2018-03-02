<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Mailers;
use App\Repositories\ClientesRepository;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class RegisterController extends Controller {

    /**
     * The persons repository.
     *
     * @var \App\Repositories\ClientesRepository
     */
    protected $persons;

    /**
     * The users repository.
     *
     * @var \App\Repositories\Contracts\UserRepositoryInterface
     */
    protected $users;

    /**
     * Create a new controller instance.
     *
     * @param \App\Repositories\ClientesRepository $persons
     * @param \App\Repositories\Contracts\UserRepositoryInterface $users
     * @return void
     */
    public function __construct(ClientesRepository $persons, UserRepository $users) {

        $this->persons = $persons;
        $this->users = $users;
    }

    /**
     *  Register user account.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Mail\Mailers $mailers
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request, Mailers $mailers) {

        $this->validate($request, ['first_name' => 'required|string|max:60', 'last_name' => 'required|string|max:60', 'email' => 'bail|required|email|unique:users', 'cell_phone' => 'max:45', 'phone' => 'max:45', 'document' => 'max:45', 'password' => 'required|string|min:6', 'gender' => 'required']);

        $user = $this->persons->register(array_merge($request->all(), ['contact_email' => $request->input('email'), 'email_verification' => false,]));

        $mailers->sendEmailVerification($user);

        return response()->json(['message' => 'register user account', 'data' => ['person' => $user->person->load('user')]], 201);

    }

    /**
     *
     * validate email for user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateEmail(Request $request) {

        $this->validate($request, ['code' => 'required|max:32']);

        $this->users->findBy('code', $request->input('code'))->validateEmail();

        return response()->json(['message' => 'email verified']);
    }

    /**
     *
     * resend email for validate.
     *
     * @param \App\Mail\Mailers $mailers
     * @param \Illuminate\Contracts\Auth\Guard $guard
     * @return \Illuminate\Http\JsonResponse
     */
    public function reSendValidate(Mailers $mailers, Guard $guard) {

        $mailers->sendEmailVerification($guard->user());

        return response()->json(['message' => 'email send']);
    }

    /**
     *
     * resend email by user id for validate.
     *
     * @param \App\Mail\Mailers $mailers
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function reSendValidateById(Mailers $mailers, $id) {

        $user = $this->users->getUsersForIdMd5($id)->first();

        $mailers->sendEmailVerification($user);

        return response()->json(['message' => 'email send']);
    }

}