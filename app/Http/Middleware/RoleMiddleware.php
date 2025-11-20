<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        // Nếu chưa đăng nhập → redirect
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Bạn chưa đăng nhập.');
        }

        // Nếu role của user không khớp → báo lỗi
        if (Auth::user()->role !== $role) {
            return redirect('/panel')->with('error', 'Bạn không có quyền truy cập trang này.');
        }

        return $next($request);
    }
}
