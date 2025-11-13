<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý điểm sinh viên</title>
    {{-- <link rel="stylesheet" href="{{ auto_asset('css/score.css') }}"> --}}
    <link rel="stylesheet" href="{{ secure_asset('css/score.css') }}">
</head>
<body>
    <div class="panel-container">
        <h2>Quản lý điểm</h2>

        {{-- Bộ lọc nhóm môn học --}}
       <div class="filter-box">
        <form method="GET" action="{{ route('scores.index') }}">
            <label>Chọn nhóm:</label>
            <select name="group_id" onchange="this.form.submit()">
                <option value="">Tất cả</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}" {{ request('group_id') == $group->id ? 'selected' : '' }}>
                        {{ $group->tenNhom }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

        <table>
            <thead>
                <tr>
                    <th>Sinh viên</th>
                    <th>Môn học</th>
                    <th>Học kỳ</th>
                    <th>Điểm GK</th>
                    <th>Điểm CK</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($scores as $score)
                    <tr>
                        <td>{{ $score->student->name ?? 'Không rõ' }}</td>
                        <td>{{ $score->subject->tenMh ?? 'Không rõ' }}</td>
                        <td>{{ $score->hocKy }}</td>
                        <td>{{ $score->diemgk }}</td>
                        <td>{{ $score->diemck }}</td>
                        <td>
                            <a class="btn" href="{{ route('scores.edit', $score->id) }}">Sửa</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;">Không có dữ liệu</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('panel') }}">← Quay lại</a>
    </div>
</body>
</html>
