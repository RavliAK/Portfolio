<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Mail\PasswordMail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class mailcontroller extends Controller
{
    Public function sendWelcome(Order $order){
    Mail::to('ravli.kahfi@gmail.com')->send(new WelcomeMail($order));
    return redirect("/belanja")->with('success','Invoice sent');
    }
    
    Public function indexReset(User $user){
        return view('resetpassword',[
            'title'=>'Reset',
            'user'=> $user
        ]);
    }

    Public function sendReset(Request $request){
        
        if(User::where('email', $request->email)->exists()){
            Mail::to($request->email)->send(new PasswordMail(User::where('email', $request->email)->first()->id));
            return redirect("/login")->with('success','Check your email to reset password');
        }
        return back()->with('loginError','Email not found');
        
        }
    //Send welcome email di Mail::to bisa diganti  $request->email

}
