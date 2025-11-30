<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Điểm của tôi</title>
    <link rel="stylesheet" href="{{ auto_asset('css/score.css') }}">
</head>
<body>
    <div class="panel-container">
    <a href="{{ route('panel') }}" class="back-btn">Quay lại</a>
        <h2>Điểm của {{ $user->name }}</h2>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Môn học</th>
                    <th>Năm học</th>
                    <th>Học kỳ</th>
                    <th>Điểm giữa kỳ</th>
                    <th>Điểm cuối kỳ</th>
                    <th>Tổng điểm</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($scores as $score)
                    @php
                        $tong = ($score->diemgk + $score->diemck) / 2;
                        $subject = $score->subject;
                        $term = $subject->term ?? null;
                    @endphp

                    <tr>
                        <td>{{ $subject->tenMh ?? 'Không rõ' }}</td>

                        {{-- Năm học --}}
                        <td>{{ $term->year ?? 'N/A' }}</td>

                        {{-- Học kỳ --}}
                        <td>{{ $term->semester ?? 'N/A' }}</td>

                        <td>{{ $score->diemgk }}</td>
                        <td>{{ $score->diemck }}</td>
                        <td>{{ number_format($tong, 2) }}</td>

                        <td style="color: {{ $tong >= 5 ? 'green' : 'red' }};">
                            {{ $tong >= 5 ? 'Đạt' : 'X' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>
</html>
