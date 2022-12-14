<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class RegisteredUserController extends Controller
{
    public function store(Request $request){
        $request->validate([

            'username'=>['required','string','max:191'],
            'email'=>['required','string','email','max:191','unique:users'],
            'password'=>['required','confirmed',Rules\Password::defaults()],

        ]);

        $user = User::create([

            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),


        ]);
        $user->assignRole('cliente');
        if(! auth::user()){
            Auth::login($user);
            return view ('welcome');
        }
        return view('admin.index');
    }
}
