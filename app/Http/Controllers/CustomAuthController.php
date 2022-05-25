<?php

namespace App\Http\Controllers;

class CustomAuthController extends Controller
{
    // public function userlogin()
    // {
    //     return view('login.userlogin');
    // }
    // public function registration()
    // {
    //     return view('login.registration');
    // }
    // public function registerUser(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:5|max:12',
    //     ]);
    //     $login = new login();
    //     $login->name = $request->name;
    //     $login->email = $request->email;
    //     $login->password = Hash::make($request->password);
    //     $res = $login->save();
    //     if ($res) {
    //         return back()->with('sucess', 'you have registered');
    //     } else {
    //         return back()->with('fail', 'somethong');
    //     }
    // }
    // public function loginUser(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:5|max:12',
    //     ]);
    //     $login = login::where('email', '=', $request->email)->first();
    //     if ($login) {
    //         if (Hash::check($request->password, $login->password)) {

    //             $request->session()->put('logedIn', $login->id);
    //             return redirect('home');
    //         } else {
    //             return back()->with('fail', 'Password not match');

    //         }
    //     } else {
    //         return back()->with('fail', 'This email is not register');
    //     }
    // }
    // public function forgetpassword()
    // {
    //     return view('login.forgetpassword');

    // }
    // public function resetpassword(Request $request)
    // {
    //     $login = login::whereEmail($request->email)->first();
    //     if ($login == null) {
    //         return redirect()->back()->with(['error' => 'Email not exist']);
    //     }
    //     $login = Sentinel::findById($login->id);
    //     $reminder = Reminder::exists($login) ?: Reminder::create($login);
    //     $this->sendEmail($login, $reminder->code);
    //     return redirect()->back()->with(['success' => 'Reset code sent to ']);
    // }
}