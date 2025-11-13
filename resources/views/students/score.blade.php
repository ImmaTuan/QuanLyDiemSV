<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Điểm của tôi</title>
    <link rel="stylesheet" href="{{ auto_asset('css/score.css') }}">
</head>
<body>
    <div class="panel-container">
        <h2>Điểm của {{ $user->name }}</h2>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Môn học</th>
                    <th>Học kỳ</th>
                    <th>Điểm giữa kỳ</th>
                    <th>Điểm cuối kỳ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scores as $score)
                    <tr>
                        <td>{{ $score->subject->tenMh ?? 'Không rõ' }}</td>
                        <td>{{ $score->hocKy }}</td>
                        <td>{{ $score->diemgk }}</td>
                        <td>{{ $score->diemck }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('panel') }}">← Quay lại</a>
    </div>
</body>
</html>
