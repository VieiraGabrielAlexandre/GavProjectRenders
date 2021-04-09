<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    use ApiResponser;

    public function register(RegisterUserRequest $request)
    {
        $payload = $request->all();
        $payload['password'] = Hash::make($payload['password']);
        $user = User::create($payload);

        return $this->success([
            'user' => $user,
            'token' => $user->createToken($payload['token_name'])->plainTextToken
        ]);
    }

    public function login()
    {

    }

    public function logout()
    {

    }
}
