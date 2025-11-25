<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý nhóm học</title>
    <link rel="stylesheet" href="{{ auto_asset('css/admincompo.css') }}">
</head>

<script>
document.addEventListener("DOMContentLoaded", function () {

    // ================================
    // FILTER CHO PHẦN THÊM
    // ================================
    const subjectSelect = document.getElementById('subjectSelect');
    const groupSelect = document.getElementById('groupSelect');

    if (subjectSelect && groupSelect) {
        subjectSelect.addEventListener('change', function () {
            let selectedMaMh = this.value;

            // Hiển thị đúng nhóm theo môn
            groupSelect.querySelectorAll("option").forEach(opt => {
                if (!opt.dataset.mamh) return; // bỏ option trống

                opt.style.display = (opt.dataset.mamh === selectedMaMh)
                    ? "block"
                    : "none";
            });

            groupSelect.value = ""; // không auto chọn nhóm
        });
    }

    // ================================
    // FILTER CHO PHẦN SỬA
    // ================================
    document.querySelectorAll('.editGroupSelect').forEach(select => {
        let currentMaMh = select.dataset.currentMamh;

        select.querySelectorAll('option').forEach(opt => {
            opt.style.display = (opt.dataset.mamh === currentMaMh)
                ? "block"
                : "none";
        });
    });

});
</script>

<body>

<h2>Phân nhóm cho sinh viên</h2>
<a href="{{ route('admin.dashboard') }}" class="back-btn">Quay lại</a>




<!-- ================================
     FORM THÊM SINH VIÊN VÀO NHÓM
================================ -->
<form method="POST" action="{{ route('admin.groups.addStudent') }}">
    @csrf

    <label>Môn học:</label>
    <select id="subjectSelect">
        <option value="">-- Chọn môn học --</option>
        @foreach($subjects as $s)
            <option value="{{ $s->maMh }}">{{ $s->tenMh }} ({{ $s->maMh }})</option>
        @endforeach
    </select>

    <label>Nhóm môn học:</label>
    <select name="group_id" id="groupSelect">
        <option value="">-- Chọn nhóm --</option>
        @foreach ($groups as $g)
            <option value="{{ $g->id }}" data-mamh="{{ $g->subject->maMh }}">
                {{ $g->tenNhom }} — {{ $g->subject->maMh }}
            </option>
        @endforeach
    </select>

    <label>Sinh viên:</label>
    <select name="user_id">
        @foreach ($students as $s)
            <option value="{{ $s->id }}">{{ $s->name }}</option>
        @endforeach
    </select>

    <button type="submit">Thêm</button>
</form>

<hr>

<!-- ================================
     DANH SÁCH SINH VIÊN TRONG NHÓM
================================ -->
<h2>Danh sách sinh viên trong nhóm</h2>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif
<table border="1" cellpadding="8">
    <tr>
        <th>Môn</th>
        <th>Nhóm</th>
        <th>Sinh viên</th>
        <th>Hành động</th>
    </tr>

    @foreach($details as $d)
        <tr>
            <td>{{ $d->group->subject->tenMh }} ({{ $d->group->subject->maMh }})</td>
            <td>{{ $d->group->tenNhom }}</td>
            <td>{{ $d->student->name }}</td>

            <td>
                <!-- SỬA -->
                <form action="{{ route('admin.groups.update', $d->id) }}" 
                      method="POST" style="display:inline-block;">
                    @csrf
                    @method('PUT')

                    <select name="group_id" class="editGroupSelect"
                            data-current-mamh="{{ $d->group->subject->maMh }}">
                        @foreach($groups as $g)
                            <option 
                                value="{{ $g->id }}"
                                data-mamh="{{ $g->subject->maMh }}"
                                {{ $g->id == $d->group_id ? 'selected' : '' }}
                            >
                                {{ $g->tenNhom }} — {{ $g->subject->maMh }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit">Sửa</button>
                </form>

                <!-- XOÁ -->
                <form action="{{ route('admin.groups.delete', $d->id) }}" 
                      method="POST" style="display:inline-block;">
                    @csrf 
                    @method('DELETE')
                    <button class="btn-delete">Xoá</button>
                </form>

            </td>
        </tr>
    @endforeach
</table>


</body>
</html>
