<?php

namespace App\Services;

use App\Models\User;
use App\DataTransfers\LoginDTO;
use App\DataTransfers\RegisterDTO;
use App\Contracts\AuthContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final class AuthService implements AuthContract
{

    public function register(RegisterDTO $registerDTO): User
    {
        $encryptPassword = Hash::make($registerDTO->password);

        return User::create([
            'name'     => $registerDTO->name,
            'email'    => $registerDTO->email,
            'password' => $encryptPassword
        ]);
    }

    /**
     * @throws \Exception
     */
    public function login(LoginDTO $loginDTO): \Illuminate\Contracts\Auth\Authenticatable|bool
    {
        $isAuth = auth()->attempt([
            'email'    => $loginDTO->email,
            'password' => $loginDTO->password
        ]);

        if ($isAuth === false) {
            throw new \Exception("Invalid Credentials.");
        }
        return Auth::user();
    }
}
