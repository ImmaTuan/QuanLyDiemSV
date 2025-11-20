<!DOCTYPE html>
<html lang="vi">
<head>

    <meta charset="UTF-8">
    <title>Phân công giảng dạy</title>
    <link rel="stylesheet" href="{{ auto_asset('css/admin.css') }}">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/score.css') }}"> --}}
</head>
<body></body>
<h2>Phân công giảng dạy</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form action="" method="POST">
    @csrf

    <!-- CHỌN MÔN HỌC -->
    <label>Môn học:</label>
    <select name="subject_id" id="subjectSelect">
        @foreach($subjects as $s)
            <option value="{{ $s->id }}" data-mamh="{{ $s->maMh }}">
                {{ $s->tenMh }} ({{ $s->maMh }})
            </option>
        @endforeach
    </select>

    <!-- CHỌN GIẢNG VIÊN -->
    <label>Giảng viên:</label>
    <select name="teacher_id">
        @foreach($teachers as $t)
            <option value="{{ $t->id }}">{{ $t->name }}</option>
        @endforeach
    </select>

    <!-- CHỌN NHÓM MÔN HỌC – SẼ LỌC LẠI -->
    <label>Nhóm môn học:</label>
    <select name="group_id" id="groupSelect">
        @foreach($groups as $g)
            <option value="{{ $g->id }}" data-mamh="{{ $g->maMh }}">
                {{ $g->tenNhom }} ({{ $g->maMh }})
            </option>
        @endforeach
    </select>

    <button type="submit">Phân công</button>
</form>

<script>
// ==== LỌC NHÓM THEO MÔN HỌC ====
document.getElementById('subjectSelect').addEventListener('change', function () {
    let selectedMaMh = this.options[this.selectedIndex].dataset.mamh;

    document.querySelectorAll('#groupSelect option').forEach(opt => {
        if (opt.dataset.mamh === selectedMaMh) {
            opt.style.display = "block";
        } else {
            opt.style.display = "none";
        }
    });

    // Chọn nhóm đầu tiên hợp lệ
    let firstValid = Array.from(document.querySelectorAll('#groupSelect option'))
        .find(opt => opt.dataset.mamh === selectedMaMh);

    if (firstValid) {
        firstValid.selected = true;
    }
});

// Trigger lọc ngay khi mở trang
document.getElementById('subjectSelect').dispatchEvent(new Event('change'));
</script>


<a href="{{ route('admin.dashboard') }}">← Quay lại</a>
</body>
</html>