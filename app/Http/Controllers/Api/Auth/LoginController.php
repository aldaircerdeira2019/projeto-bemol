<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;


class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        $user =  !!User::where('email', $request['email'])->get()->count();
        if(!$user){
            throw ValidationException::withMessages([
                'email' =>['Email não cadastrado.']
            ]);
        }
         if (Auth::attempt($request->only('email', 'password'))){
            return response()->json(Auth::user(), 200);
        }
        throw ValidationException::withMessages([
            'password' =>['Senha incorreta.']
        ]);
    }

    public function logout()
    {
        Auth::logout();
    }
}
