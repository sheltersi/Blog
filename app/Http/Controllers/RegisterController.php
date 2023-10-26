<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        //create the user
      $attributes =  request()->validate([
            'name'=>'required|max:255',
            'username'=>'required|max:255|unique:users,username',
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>['required','min:7','max:255']
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

    $user = User::create($attributes);

    // login the user
    auth()->login($user);

    //session()->flash('success', 'your account has been created');

    return redirect('/')->with('success', 'your account has been created');

}
}
