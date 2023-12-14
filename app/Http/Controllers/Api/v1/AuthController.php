<?php

namespace App\Http\Controllers\Api\v1;

use App\Services\UserService;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\LoginRequest;
use App\Http\Resources\Api\v1\AuthResource;
use App\Http\Requests\Api\v1\RegisterRequest;
//use Illuminate\Http\Response;

class AuthController extends Controller
{
 
    private UserService $userService;

    function __construct(UserService $userService)
    {
      $this->userService = $userService;
    }

    /**
     * register.
     */
    public function register(RegisterRequest $request)
    {
        $user = $this->userService->register($request->validated());

        return AuthResource::make($user);
    }

   
 /**
     * login.
     */
    public function login(LoginRequest $request)
    {
        $data = $this->userService->login($request->validated());
        if(!$data)
        {
            return response()->json([
                'message' => __('Invalid Credentials')
            ], Response::HTTP_UNAUTHORIZED);
        }

        return AuthResource::make($data);
    }

    public function logout()
    {
         $data = $this->userService->logout();

         return response()->json([], Response::HTTP_NO_CONTENT);   
    }
    
}
