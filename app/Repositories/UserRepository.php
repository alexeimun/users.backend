<?php

namespace App\Repositories;

use App\Exceptions\UserInvalid;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Hash;

class UserRepository extends Repository {

    /**
     * Create a new repository instance.
     *
     * @param User $model
     * @param Guard $guard
     */
    public function __construct(User $model) {
        $this->model = $model;
    }

    public function test() {

        $users = [
            [
                'name' => 'Brianna',
                'phone' => '2211488',
                'email' => 'bina@hotmail.com',
                'articles' => [
                    [
                        'name' => 'Survivor',
                        'type' => 3,
                        'code' => '9091',
                        'comments' => [
                            [
                                'comment' => 'What a game!'
                            ], [
                                'comment' => 'This is funny'
                            ]
                        ]
                    ], [
                        'name' => 'Princesa sofía',
                        'type' => 2,
                        'code' => '10101',
                        'comments' => [
                            [
                                'comment' => 'Yo no sé!'
                            ]
                        ]
                    ]
                ]
            ]
        ];
        //foreach ($users as $user) {
        //$u= new User;
        //User::createBatch([['name'=>'julio']]);
        //return $user;
        //$u->create([])
        //return'ok';
        //}

        //return  \DBwhere('id', '12')::table('users')->select('email')->get();
        return User::whereHas('articles', function ($q) {
            $q->ofType(2);
        })->with(['articles' => function ($q) {
            $q->with('comments')->withCount('comments');
        }])->withCount('articles')->get();
        //foreach (User::with('articles')->cursor() as $user) {
        //    return $user->;
        //}
        //return count(DB::table('acl_roles as r')
        //    ->select('r.name as role', 'p.name as pais')
        //    ->join('allus_le_paises_roles as rp', 'rp.paro_role_id', '=', 'r.id')
        //    ->join('allus_le_paises as p', 'p.id', '=', 'rp.paro_pais_id')
        //    ->where('p.name', $sNameCountry)
        //    ->where('r.name', $sNameRole)
        //    ->get());
    }

    /**
     * {@inheritdoc}
     */
    public function getUserForIdMd5($id) {
        return $this->model->with(['person'])->whereRaw('md5(id) = :id', ['id' => $id])->firstOrFail();
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
    public function searchQuery($query) {
        return $this->model->where($query)->firstOrFail()->id;
    }

    /**
     * @param $collection
     * @return mixed
     */
    public function findBunchOfUsers($collection) {
        return $this->model->with(['person'])->whereIn('id', $collection)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function updatePassword($email, $password) {

        $user = $this->findBy('email', $email);

        if(is_null($user)) {
            throw new UserInvalid;
        }

        $user->forceFill([
            'password' => Hash::make($password)
        ])->save();
    }

}

