<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bảng điều khiển</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="{{ auto_asset('css/panel.css') }}"> --}}
    <link rel="stylesheet" href="{{ secure_asset('css/panel.css') }}">
</head>
<body>
    <div class="panel-container">
        <div class="header">
            <h2>Xin chào, {{ $user->name }}</h2>
            <a href="{{ route('logout') }}" class="logout-btn">Đăng xuất</a>
        </div>

        <div class="info-box">
            <h3>Thông tin cá nhân</h3>
            <ul>
                <li><strong>Vai trò:</strong> 
                    @if ($user->role === 'student')
                        Sinh viên
                    @elseif ($user->role === 'teacher')
                        Giảng viên
                    @else
                        Không xác định
                    @endif
                </li>

                @if ($user->MaSV)
                    <li><strong>Mã sinh viên:</strong> {{ $user->MaSV }}</li>
                @endif

                @if ($user->MaGV)
                    <li><strong>Mã giảng viên:</strong> {{ $user->MaGV }}</li>
                @endif

                <li><strong>Email:</strong> {{ $user->email }}</li>

                @if ($user->class_id && $user->class)
                    <li><strong>Lớp:</strong> {{ $user->class->name }}</li>
                @endif
            </ul>
        </div>

        <div class="action-box">
            <h3>Chức năng</h3>
            <div class="btn-group">
                <a href="#" class="btn">Xem nhóm</a>
                <a href="{{ route('scores.index') }}" class="btn">Xem điểm</a>
                <a href="#" class="btn">Cập nhật thông tin</a>
            </div>
        </div>
    </div>
</body>
</html>
