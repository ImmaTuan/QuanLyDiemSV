<!DOCTYPE html>
<html lang="vi">
<head>

    <meta charset="UTF-8">
    <title>Quản lý nhóm học</title>
    <link rel="stylesheet" href="{{ auto_asset('css/admin.css') }}">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/score.css') }}"> --}}
</head>
<body></body>
<h2>Phân nhóm cho sinh viên</h2>

<form method="POST" action="{{ route('admin.groups.addStudent') }}">
    @csrf

    <select name="group_id">
        @foreach ($groups as $g)
            <option value="{{ $g->id }}">{{ $g->tenNhom }}</option>
        @endforeach
    </select>

    <select name="user_id">
        @foreach ($students as $s)
            <option value="{{ $s->id }}">{{ $s->name }}</option>
        @endforeach
    </select>

    <button type="submit">Thêm</button>
</form>
<a href="{{ route('admin.dashboard') }}">← Quay lại</a>
</body>
</html>