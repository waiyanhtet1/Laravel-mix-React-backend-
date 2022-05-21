<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        if(auth()->user()){
            return redirect('/admin');
        }
        return view('auth.login');
    }

    public function login_post(Request $request){
        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email လိုအပ်ပါသည်',
            'password.required' => 'Password လိုအပ်ပါသည်'
        ]);

        $crud = $request->only('email','password');
        if(Auth::attempt($crud)){
            if(auth()->user()->is_admin == 'yes'){
                return redirect('/admin')->with('success','Login Success!');
            }
            return back();
        }
        return back()->with('fail','ယခု email မရှိပါ');
    }

    public function logout(){
        Auth::logout();
        return redirect('/admin/login');
    }
}
