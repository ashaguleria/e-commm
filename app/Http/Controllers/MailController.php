<?php

namespace App\Http\Controllers;

use App\Notifications\mailNotification;
use Illuminate\Http\Request;
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

}