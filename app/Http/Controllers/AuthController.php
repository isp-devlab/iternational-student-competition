<?php

namespace App\Http\Controllers;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

    public function forgot(){
        $data = [
            'title' => 'Forgot Password',
            'subTitle' => null,
            'page_id' => null
        ];
        return view('auth.forgot',  $data);
    }

    public function forgotSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|exists:users',
        ]);
        if ($validator->fails()) {
            return redirect()->route('forgot')->withInput()->withErrors($validator);
        }
        $token = Uuid::uuid4();
                DB::table('password_reset_tokens')->insert([
                    'email' => $request->email, 
                    'token' => $token, 
                ]); 
        Mail::send('email.forgetPassword', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return redirect()->route('forgot')->with('success', 'Email sent successfuly, Please check your email for reset password');
    }

    public function reset($token){
        $cekToken = DB::table('password_reset_tokens')->where('token', '=', $token)->first();
        if (!$cekToken) {
            return redirect()->route('login')->with('error', 'Invalid token');
        }
        $data = [
            'user' => User::where('email', $cekToken->email)->firstOrFail(),
            'token' => $token,
            'title' => 'Reset Password',
            'subTitle' => null,
            'page_id' => null
        ];
        return view('auth.reset',  $data);
    }

    public function resetSubmit($token, Request $request){
        $updatePassword = DB::table('password_reset_tokens')->where(['email' => $request->email,'token' => $token])->first();
        if(!$updatePassword){
            return redirect()->route('login')->with('error','Token Invalid');
        }
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->route('reset', $token)->withInput()->withErrors($validator);
        }
        User::where('email', $updatePassword ->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();
        return redirect()->route('login')->with('success','Congratulation!, Your password has been changed successfully');
    }
    
}
