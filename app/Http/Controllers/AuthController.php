<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)
                    ->orWhere('MaSV', $request->email)
                    ->orWhere('MaGV', $request->email)
                    ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('/panel');
        }

        return back()->with('error', 'Sai thông tin đăng nhập!');
    }

    public function panel()
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Bạn chưa đăng nhập.');
        }

        return view('panel', ['user' => Auth::user()]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('message', 'Đã đăng xuất.');
    }
}
