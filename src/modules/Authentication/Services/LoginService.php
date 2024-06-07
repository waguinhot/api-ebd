<?php

namespace Src\Modules\Authentication\Services;

use App\Models\User;

class LoginService {
    public function login(string $email, string $password){

        $user = $this->getUser($email);

        if(!$user || $user->status == 0){
            return false;
        }

        $token = auth()->attempt(['email' => $email , 'password' => $password]);
        if (!$token) {
            return false;
        }


        return $token;
    }

    private function getUser(string $email){
        $user = User::where('email', $email)->first();
        return $user;
    }
}
