<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService 
{
    /**
     * create new user
     * @var array $data
     * @return  User
     */
    public function create($data)
    {
        $user = new User();
        $user->fill($data);
        $user->save();

        return  $user;
    }

 
    public function update($id, $data)
    {
        $user = User::findOrFail($id);
        $user->fill($data);
        $user->save();

        return  $user;

    }
  
    public function dalete($id)
    {
         $user = User::findOrFail($id);
         $user->delete();

         return  True;
    }
    
    public function register($data)
    {
        $user = $this->create($data);
        $tokan = $user->createToken('API TOKAN')->plainTextToken;

         return  compact('user', 'tokan');
    }
    public function login($data)
    {
        if(Auth::attempt($data))
        {
            $user = user::where('email', $data['email'])->first();
            $tokan = $user->createToken('API TOKAN')->plainTextToken;

            return  compact('user', 'tokan');
        }

        return false;
    }
    public function logout()
    {
        $user = Auth()->user();
        $user->tokens()->delete();

        return true;
    }

}
