<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ auto_asset('css/login.css') }}">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/login.css') }}"> --}}
</head>
<body>
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <h3>Đăng nhập hệ thống</h3>

        {{-- Hiển thị thông báo lỗi --}}
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Hiển thị thông báo thành công (nếu có) --}}
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        {{-- Input email hoặc mã SV / GV --}}
        <input type="text" name="email" placeholder="Email / Mã SV / Mã GV" value="{{ old('email') }}" required>

        {{-- Input mật khẩu --}}
        <input type="password" name="password" placeholder="Mật khẩu" required>

        {{-- Nút submit --}}
        <button type="submit">Đăng nhập</button>

 
        @if ($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>
</body>
</html>
