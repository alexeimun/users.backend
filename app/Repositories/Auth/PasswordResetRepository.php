<?php

namespace App\Repositories\Auth;

use App\Models\Auth\PasswordReset;
use App\Repositories\Repository;
use App\Exceptions\TokenInvalid;
use Illuminate\Support\Str;

class PasswordResetRepository extends Repository{

    /**
     * Create a new repository instance.
     *
     * @param PasswordReset $model
     * @param Guard $guard
     */
    public function __construct(PasswordReset $model){
        $this->model = $model;
    }
    
    public function createToken($email){
        return $this->model->updateOrCreate(['email' => $email],[
            'token' => hash_hmac('sha256', Str::random(40), 'XPYcmWweEYfysTMU')
        ]);
    }

    public function findEmailbyToken($token){

        $passwordReset = $this->model->where('token', $token)->first();

        if(is_null($passwordReset)){
            throw new TokenInvalid;  
        }

        $email = $passwordReset->email;
        $passwordReset->delete();

        return $email;
    }

}

