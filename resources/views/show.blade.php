<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông tin cá nhân</title>
    <link rel="stylesheet" href="{{ auto_asset('css/profile.css') }}">
</head>
<body>

<div class="profile-container">
    <a href="{{ route('panel') }}" class="back-btn">← Quay lại</a>
    <h2>Thông tin cá nhân</h2>

    @if($profile)
        <table class="profile-table">
            <tr><th>Họ tên</th><td>{{ $profile->ho_ten }}</td></tr>
            <tr><th>Giới tính</th><td>{{ $profile->gioi_tinh }}</td></tr>
            <tr><th>Số điện thoại</th><td>{{ $profile->so_dien_thoai }}</td></tr>
            <tr><th>Địa chỉ</th><td>{{ $profile->dia_chi }}</td></tr>
            <tr><th>Quê quán</th><td>{{ $profile->que_quan }}</td></tr>
            <tr><th>Ngày sinh</th><td>{{ $profile->ngay_sinh }}</td></tr>
        </table>
    @else
        <div class="alert alert-error">Bạn chưa có thông tin cá nhân.</div>
    @endif
</div>

</body>
</html>
