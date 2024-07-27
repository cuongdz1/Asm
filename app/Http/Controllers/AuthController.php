<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // đăng nhập

    public function ShowFormlogin()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $user = $request->validate([
            "email" => "required|string|email|max:255",
            "password" => "required|string",
        ]);

        $admin = $request->validate([
            "email" => "required|string|email|max:255",
            "password" => "required|string",
        ]);

        // dd($user);
        if (Auth::attempt($user)) {
            return redirect()->intended('home');
        }elseif(Auth::attempt($admin)){
            return redirect()->route('auth.admin');
        }
        return redirect()->back()->withErrors([
            "email" => "Thông tin người dùng không đúng",
        ]);
    }
    // đăng xuất


    // đăng ký
    public function showFormregister()
    {
        return view("auth.register");

    }
    public function register(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|string|email|max:255",
            "password" => "required|string|min:8",
        ]);
        $user = User::query()->create($data);

        Auth::login($user);

        return redirect()->intended('home');
        // dd($data);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
