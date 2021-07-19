<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginControllerRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    //
    public function register(LoginControllerRequest $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }
}
