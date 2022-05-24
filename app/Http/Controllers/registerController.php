<?php

namespace App\Http\Controllers;

class registerController extends Controller
{
    public function register()
    {
        return view('login.registeration');
    }
    public function registration(Request $request)
    {
        dd($request->all());

        $request::validate([
            'name' => 'required|string|max:20',
            'email' => 'required', 'string', 'email',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);
        $login = new login();
        $login->name = $request->name;
        $login->email = $request->email;
        $login->password = Hash::make($request->password);
        $login->save();

    }
    public function forgetpassword()
    {

    }
}