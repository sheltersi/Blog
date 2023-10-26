<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class SessionsController extends Controller
{
    
public function create(){
    return view('sessions.create');
}

public function store(){
    //validate the request
$attributes = request()->validate([
    'email' => 'required|email',
    'password' =>'required'
]);
    //attempt to authenticate and log in the user
    if(auth()->attempt($attributes)){
//auth failed 
throw ValidationException::withMessages([
    'email'=> 'Your provided credentials could not be verified'
]);
}
session()->regenerate();
    //based on the provided credentials

    //redirect with a success flash message

    return redirect('/')->with('success', 'Welcome Back');


// return back()->withErrors(['email'=> 'Your provided credentials could not be verified']);

}


   
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
