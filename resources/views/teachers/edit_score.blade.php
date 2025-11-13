<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa điểm</title>
    {{-- <link rel="stylesheet" href="{{ auto_asset('css/score.css') }}"> --}}
    <link rel="stylesheet" href="{{ secure_asset('css/score.css') }}">
</head>
<body>
    <h2>Sửa điểm cho {{ $score->student->name }}</h2>

    <form method="POST" action="{{ route('scores.update', $score->id) }}">
        @csrf
        <p>Môn học: {{ $score->subject->tenMh }}</p>
        <label>Điểm giữa kỳ:</label>
        <input type="number" name="diemgk" value="{{ $score->diemgk }}" step="0.1"><br><br>

        <label>Điểm cuối kỳ:</label>
        <input type="number" name="diemck" value="{{ $score->diemck }}" step="0.1"><br><br>

        <button type="submit">Cập nhật</button>
    </form>

    <a href="{{ route('scores.index') }}">← Quay lại</a>
</body>
</html>
