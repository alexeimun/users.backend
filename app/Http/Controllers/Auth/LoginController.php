<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\AsesoresRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Passport\Http\Controllers\HandlesOAuthErrors;

class LoginController extends Controller {

    use HandlesOAuthErrors;
    protected $asesores;
    protected $users;

    public function __construct(AsesoresRepository $asesores, UserRepository $users) {
        $this->asesores = $asesores;
        $this->users = $users;
    }

    public function authentificate(Request $request) {
        $user = $this->asesores->findWhere(['usuario' => $request->input('usuario'), 'clave' => $request->input('clave'),]);

        return response()->json($user, count($user) > 0 ? 200 : 404);
    }
}
