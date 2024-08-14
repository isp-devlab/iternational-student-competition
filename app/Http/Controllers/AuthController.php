<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        $data = [
            'title' => 'Sign-in',
            'subTitle' => null,
            'page_id' => null
        ];
        return view('auth.login',  $data);
    }

    public function loginSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->route('login')->withInput()->withErrors($validator);
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Username or password are incorrect, please try again');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function register(){
        $data = [
            'title' => 'Sign-up',
            'subTitle' => null,
            'page_id' => null,
        ];
        return view('auth.register',  $data);
    }
    
    public function registerSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('register')->withInput()->withErrors($validator);
        }
    
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    
        // Auto login the user after registration
        Auth::login($user);
    
        return redirect()->route('dashboard')->with('success', 'Congratulation!!, Your account registered successfully and you are now logged in.');
    }
    
}
