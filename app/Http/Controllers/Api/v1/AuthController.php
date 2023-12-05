<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\LoginRequest;
use App\Http\Requests\Api\v1\RegisterRequest;
use App\Http\Resources\Api\v1\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    /**
     * register.
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);

        return AuthResource::make($user);
    }

    /**
     * login.
     */
    public function login(LoginRequest $request)
    {
        //
    }

}
