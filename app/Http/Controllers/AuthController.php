<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller{
    public function postLogin(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');
        if( empty($remember)) {  //remember表示是否记住密码
            $remember = 0;
        } else {
            $remember = $request->input('remember');
        }
        //如果要使用记住密码的话，需要在数据表里有remember_token字段
        if (Auth::attempt(['name' => $name, 'password' => $password], $remember)) {
            return redirect()->intended('/problem');
        }
        else return redirect('login')->withInput($request->except('password'))->with('msg', '用户名或密码错误');
    }
}
