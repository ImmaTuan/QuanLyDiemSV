<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý môn học </title>
    <link rel="stylesheet" href="{{ auto_asset('css/admin.css') }}">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/score.css') }}"> --}}
</head>
<body>
<h2>Thêm môn học</h2>

<form method="POST" action="{{ route('admin.subjects.store') }}">
    @csrf
    <input name="maMh" placeholder="Mã môn">
    <input name="tenMh" placeholder="Tên môn">
    <input name="SoTC" placeholder="Số tín chỉ" type="number">


    <select name="term_id">
        @foreach ($terms as $tm)
            <option value="{{ $tm->id }}">{{ $tm->year }} - HK{{ $tm->semester }}</option>
        @endforeach
    </select>

    <button type="submit">Thêm môn</button>
</form>
<a href="{{ route('admin.dashboard') }}">← Quay lại</a>
</body>
</html>