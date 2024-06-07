<?php

namespace Src\Modules\Authentication\Controllers;

use App\Http\Controllers\Controller;
use Src\Modules\Authentication\Requests\LoginRequest;
use Src\Modules\Authentication\Services\LoginService;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {

        $loginService = new LoginService();
        $token = $loginService->login($request->email, $request->passowrd);

        if ($token == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $response =  $this->respondWithToken($token);

        return response()->json($response , 200);
    }


    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }


    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}
