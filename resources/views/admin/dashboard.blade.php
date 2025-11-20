<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ auto_asset('css/admin.css') }}">
</head>
<body>

<div class="panel-container">
    <div class="header">
            
            <a href="{{ route('logout') }}" class="logout-btn">Đăng xuất</a>
        </div>
    <h2>Quản trị hệ thống</h2>

    <ul>
        <li><a href="{{ route('admin.terms') }}">Quản lý năm học - học kỳ</a></li>
        <li><a href="{{ route('admin.subjects') }}">Quản lý môn học</a></li>
        <li><a href="{{ route('admin.assign') }}">Phân công giảng viên</a></li>
        <li><a href="{{ route('admin.groups') }}">Phân lớp / nhóm học</a></li>

    </ul>


</div>

</body>
</html>
