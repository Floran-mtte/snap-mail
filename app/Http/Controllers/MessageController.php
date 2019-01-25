<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\View\View;
use Mail;

class MessageController extends Controller
{
    public function saveMessage(Request $request, Message $msg){
        $msg->email_sender = $request->email_user;
        $msg->email_content = $request->mail_content;
        $msg->code = $this->generateCode();
        $msg->save();

        $request->session()->flash('alert-success', 'User was successful added!');

        $data = ['email' => $msg->email_sender, 'code' => $msg->code];
        Mail::send('email.email', $data, function ($m) use ($data) {
            $m->to($data['email'])->subject("Snap Mail - new message");

        });
        $request->session()->flash('alert-success', 'User was successful added!');
        return view('welcome');


    }

    public function generateCode($length = 10)
    {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public function viewMessage(Request $request)
    {
        $code = $request->code;
        $msg = Message::where('code', '=', $code)->firstOrFail();

        $data = ['sender' => $msg->email_sender, 'message' => $msg->email_content];
        $msg->delete();

        return view('email.view', $data);


    }
}
