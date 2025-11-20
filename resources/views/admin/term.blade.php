<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý năm học</title>
    <link rel="stylesheet" href="{{ auto_asset('css/admin.css') }}">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/score.css') }}"> --}}
</head>
<body>
<h2>Thêm năm học</h2>

<form method="POST" action="{{ route('admin.terms.store') }}">
    @csrf
    <input type="number" name="year" placeholder="Năm học (vd: 2024)" required>
    <select name="semester">
        <option value="1">Học kỳ 1</option>
        <option value="2">Học kỳ 2</option>
    </select>
    <button type="submit">Thêm</button>
</form>

<hr>

<h3>Danh sách năm học</h3>
<ul>
@foreach ($terms as $t)
    <li>{{ $t->year }} - HK{{ $t->semester }}</li>
@endforeach
</ul>
        <a href="{{ route('admin.dashboard') }}">← Quay lại</a>
</body>
</html>