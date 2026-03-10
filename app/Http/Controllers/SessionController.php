<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(){


    //validate
    //attempt to login the user
    //if success regenrate session token 
    //redirect
    $pika = request()->validate([
        'email'=>['required','email'],
        'password'=>['required']
    ]);

    if(!Auth::attempt($pika)){
        throw ValidationException::withMessages([
            'email'=> 'Sorry, the 
            provided email doesnt exist or wrong password',
            // 'password'=> 'Sorry, the 
            // password doesnt match or the 
            // provided email doesnt exist '
        ]);
    };

    request()->session()->regenerate();
    return redirect('/');  

    }
    public function logout(Request $request)
{
    Auth::logout(); // log the user out
    $request->session()->invalidate(); // clear session
    $request->session()->regenerateToken(); // regenerate CSRF token
    return redirect('/'); // redirect to homepage
}
}
