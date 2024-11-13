<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getlogin()
    {
        return view('login');
    }

    public function dologin(Request $request)
    {
        $credentiels = [
            'password'=>$request->password,
            'status'=>1
        ];
        if(filter_var($request->username, FILTER_VALIDATE_EMAIL)){
            $credentiels["email"] = $request->username;
        }else{
            $credentiels["username"] = $request->username;
        }

        if(Auth::attempt($credentiels))
        {
            return redirect()->route('site.home');
        }
        else{
            return redirect()->route('auth.login')->with("message","Đăng nhập không thành công!");
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('site.home');
    }
}
