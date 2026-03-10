<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\file;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Blogers;
class RegisterController extends Controller
{ 
    public function create (){
        return view('auth.register');
        }
    public function store(Request $request)
    {
      
        //validate
        //create the user
        //Log in
        // redirect user

        $attributes = $request->validate([
            'name' =>['required','min:3'],
            'email' =>['required','email','max:254','unique:users,email'],
            'password' =>['required',Password::min(6)->letters(1)->numbers(1) ,'confirmed'],
            //confirm work on another field with same name like
            //if password than password_confirmation
            //email->email_confirmation
        ]);

        $bloggerAtt = $request->validate([
        'bname'=>['required'],
        'logo'=>['required',$request->file(['png','jpg','webp'])],
        
        ]);
        
        $logoPath = $request->logo->store('logo');
        $user = User::create($attributes);
        $user->blogers()->create([
            'name'=>$bloggerAtt['bname'],
            'logo'=>$logoPath,
        ]);
        Auth::login($user);
        
        return redirect('/');
         
    }

}
