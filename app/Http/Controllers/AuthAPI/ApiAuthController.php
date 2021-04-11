<?php

namespace App\Http\Controllers\AuthAPI;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function login(LoginUserRequest $request)
    {
        $payload = $request->all();

        if (!Auth::attempt($payload)) {
            return $this->error('Credentials not match', 401);
        }

        return $this->success([
            'token' => auth()->user()->createToken('Token Login')->plainTextToken,
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }
}
