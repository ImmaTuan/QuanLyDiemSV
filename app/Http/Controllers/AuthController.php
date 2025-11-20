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

        $loginInput = $request->email; // email hoặc userId

        // Tìm user theo email hoặc userId
        $user = User::where('email', $loginInput)
                    ->orWhere('userId', $loginInput)
                    ->first();

        // Kiểm tra mật khẩu
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            // Điều hướng theo vai trò
            if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
           }


            return redirect('/panel');
        }

        return back()->with('error', 'Sai thông tin đăng nhập!');
    }

    public function panel()
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Bạn chưa đăng nhập.');
        }

        return view('panel', [
            'user' => Auth::user()
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('message', 'Đã đăng xuất.');
    }
}

