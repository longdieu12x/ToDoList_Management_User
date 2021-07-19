<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\LoginControllerRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //
    public function login(LoginControllerRequest $request){
        $user = User::where('email',$request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect']
            ]);
        }
        return $user->createToken('Auth Token')->accessToken;
    }
    public function logout(LoginControllerRequest $request)
    {
        $request->user()->tokens()->delete();
    }
}
