<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\mailNotification;
use Illuminate\Http\Request;
use mail;
use Notification;

class MailController extends Controller
{
    public function send()
    {
        return view('Email.mail');
    }
    public function index(Request $request)
    {
        $data = $request->all();
        Notification::route('mail', $request->email)
            ->notify(new mailNotification($data));
        return redirect()->back()->with('message', 'Mail send Successfully!');
    }
    public function mail()
    {
        $user = User::find(1)->toArray();
        Mail::send('emails.mailEvent', $user, function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Sendgrid Testing');
        });
        dd('Mail Send Successfully');
    }

}