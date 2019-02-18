<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        //Valida se o e-mail e password vindo do $request são strings
        //Isso já é uma facade do Laravel, facilitando a validação dos campos
        $this->validateLogin($request);

        //Pega somente e-mail e password para validação
        //Evita que o usuário passe mais informações no payload
        $credentials = $this->credentials($request);

        $token = \JWTAuth::attempt($credentials);

        return $this->responseToken($token);
    }

    private function responseToken($token)
    {
        return $token ? ['token' => $token] : response()->json([
            'error' => \Lang::get('auth.failed')
        ], 400);
    }
}
