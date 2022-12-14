<?php
/*
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

//use Illuminate\Validation\Exception;
use App\Models\User;
use Illuminate\Http\Request;
*/
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;



class AuthenticatedSessionController extends Controller
{
    public function store(Request $request){

        $credentials = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);

        $remember = $request->boolean('remember');
        if(Auth::attempt($credentials, $remember)){;
            $request->session()->regenerate();
        return redirect()->intended();
        }
        return back()->withErrors([
            'email'=>'Las credenciales no coinciden con nuestros registros ',

        ])->onlyInput('email');
    }


    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login');
    }
}
