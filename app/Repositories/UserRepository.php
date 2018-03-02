<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Guard;
use App\Exceptions\UserInvalid;

class UserRepository extends Repository {

    /**
     * Create a new repository instance.
     *
     * @param User $model
     * @param Guard $guard
     */
    public function __construct(User $model){
        $this->model = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function getUserForIdMd5($id) {
        return $this->model->with(['person'])->whereRaw('md5(id) = :id', [ 'id' => $id ])->firstOrFail();
    }

    /**
     * {@inheritdoc}
     */
    public function getUsersForIdMd5($idsMd5) {

        $idsMd5 = explode(',', $idsMd5);
        return $this->model->with(['person'])->whereIn(\DB::raw('md5(id)'), $idsMd5)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function getUsersForEmails($emails) {
        $emails = explode(',', $emails);
        return $this->model->with(['person'])->whereIn('email', $emails)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function searchQuery($query){
        return $this->model->where($query)->firstOrFail()->id;
    }

    /**
     * @param $collection
     * @return mixed
     */
    public function findBunchOfUsers($collection){
        return $this->model->with(['person'])->whereIn('id', $collection)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function updatePassword($email, $password) {

        $user = $this->findBy('email', $email);

        if(is_null($user)){
            throw new UserInvalid;
        }

        $user->forceFill([
            'password' => Hash::make($password)
        ])->save();
    }

}

