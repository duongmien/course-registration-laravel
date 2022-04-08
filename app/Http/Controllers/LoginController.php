<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;



class LoginController extends Controller
{
    public function index()
    {
        return view('page.login');
    }
    public function check_login(Request $request)
    {
        $username = $request->username;
        $password = md5($request->password);
        $login = Login::where('username', $username)->where('password', $password)->first();
        if ($login) {
            if ($login->role_id == 1) {
                Session::put('name', $login->name);
                Session::put('id_user', $login->id);
                Session::put('message', 'Login successful');
                return Redirect::to('/faculty');
                return view('faculty' . compact('login'));
            } else if ($login->role_id == 2) {
                Session::put('name', $login->name);
                Session::put('id_user', $login->id);
                Session::put('message', 'Login successful');
                return Redirect::to('/');
            }
        } else {
            Session::put('message', 'Incorrect account or password');
            return Redirect::to('/login')->withInput();
        }
    }
    public function logout()
    {
        Session::put('name', null);
        Session::put('id_user', null);
        return Redirect::to('/login');
    }
}
