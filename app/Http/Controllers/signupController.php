<?php

namespace App\Http\Controllers;

use App\Notifications\registernotification;
use Notification;

class signupController extends Controller
{
    public static function sendSignupEmail($name, $email, $password)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,

        ];
        Notification::route('mail', $email)
            ->notify(new registernotification($data));
        return redirect()->back()->with('message', 'Mail send Successfully!');

    }
}