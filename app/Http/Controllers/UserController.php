<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller {

    protected $users;

    public function __construct(UserRepository $users) {
        $this->users = $users;
    }

    public function show($id) {

        $data = $this->users->findOrFail($id)->load('person');
        return response()->json($data);
    }

    public function all() {

        $data = $this->users->all();
        return response()->json(['data' => $data]);
    }

    /**
     * Get profile for user with id in md5
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showMd5($id) {

        $data = $this->users->getUserForIdMd5($id);
        return response()->json($data);
    }

    /**
     * Get profiles for multiple users with id in md5
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchMd5(Request $request) {

        $data = $this->users->getUsersForIdMd5($request->input('users'));
        return response()->json(['data' => $data]);
    }

    /**
     * Get profiles for multiple users with email
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchEmail(Request $request) {

        $data = $this->users->getUsersForEmails($request->input('users'));
        return response()->json(['data' => $data]);
    }

    /**
     * @param $ids
     * @return \Illuminate\Http\JsonResponse
     */
    public function bunchUsers($ids) {
        $data = $this->users->findBunchOfUsers(explode(',', $ids));
        return response()->json(['data' => $data]);
    }

    /**
     * Get user query
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchQuery(Request $request) {

        $data = $this->users->searchQuery($request->input());
        return response()->json(['id' => $data]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function permissions(Request $request) {

        $this->validate($request, ['email' => 'required|exists:users|email', 'permissions' => 'required']);

        $user = $this->users->findBy('email', $request->input('email'));
        $permission = $user->permissions()->where('name', 'ad-management')->first();

        if(is_null($permission)) {
            $user->permissions()->attach(1);
        }

        if($request->has('permissions')) {
            $user->permissions_binary = $request->input('permissions');
        }

        $user->save();

        return response()->json($user);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removePermissions(Request $request) {

        $this->validate($request, ['email' => 'required|exists:users|email',]);

        $user = $this->users->findBy('email', $request->input('email'));
        $permission = $user->permissions()->where('name', 'ad-management')->first();

        if(!is_null($permission)) {
            $user->permissions()->detach(1);
        }

        $user->permissions_binary = null;
        $user->save();

        return response()->json($user);
    }

    public function concurso() {

        $users = $this->users->findWhere('id', '>', 68532);

        return response()->json($users);
    }

}
