<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý điểm sinh viên</title>
    <link rel="stylesheet" href="{{ auto_asset('css/score.css') }}">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/score.css') }}"> --}}
</head>
<body>
    <div class="panel-container">
    <a href="{{ route('panel') }}" class="back-btn">Quay lại</a>

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
                    <th>Mã Sinh Viên</th>
                    <th>Môn học</th>
                    <th>Điểm GK</th>
                    <th>Điểm CK</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
@forelse ($scores as $score)
    {{-- ===== DÒNG HIỂN THỊ ===== --}}
    <tr id="rowShow{{ $score->id }}">
        <td>{{ $score->student->name }}</td>
        <td>{{ $score->student->userId }}</td>
        <td>{{ $score->subject->tenMh }}</td>
        <td>{{ $score->diemgk }}</td>
        <td>{{ $score->diemck }}</td>
        <td>
            <button class="btn-edit" onclick="toggleEdit({{ $score->id }})">Cập Nhật</button>
        </td>
    </tr>

    {{-- ===== DÒNG SỬA (ẨN) ===== --}}
    <tr id="rowEdit{{ $score->id }}" style="display:none; background:#f7f7f7;">
        <td colspan="5">
            <form method="POST" action="{{ route('scores.update', $score->id) }}">
                @csrf

                <strong>{{ $score->student->name }}</strong> - {{ $score->subject->tenMh }}
                <br><br>

                <label>Điểm GK:</label>
                <input type="number" name="diemgk" step="0.1"
                    value="{{ $score->diemgk }}" style="width:80px;"> &nbsp;

                <label>Điểm CK:</label>
                <input type="number" name="diemck" step="0.1"
                    value="{{ $score->diemck }}" style="width:80px;">

                <br><br>

                <button type="submit" class="btn-save">Lưu</button>
                <button type="button" class="btn-cancel" onclick="toggleEdit({{ $score->id }})">
                    Huỷ
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="6" style="text-align:center;">Không có dữ liệu</td>
    </tr>
@endforelse
</tbody>

        </table>

    </div>
</body>
<script>
function toggleEdit(id) {
    const rowShow = document.getElementById('rowShow' + id);
    const rowEdit = document.getElementById('rowEdit' + id);

    if (rowEdit.style.display === 'none') {
        rowEdit.style.display = 'table-row';
        rowShow.style.display = 'none';
    } else {
        rowEdit.style.display = 'none';
        rowShow.style.display = 'table-row';
    }
}
</script>

</html>
