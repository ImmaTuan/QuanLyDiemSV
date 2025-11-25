<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Phân công giảng dạy</title>
    <link rel="stylesheet" href="{{ auto_asset('css/admincompo.css') }}">
</head>

<body>

<h2>Phân công giảng dạy</h2>
<a href="{{ route('admin.dashboard') }}" class="back-btn">Quay lại</a>



{{-- ================== FORM THÊM PHÂN CÔNG ================== --}}
<form action="{{ route('admin.assign.store') }}" method="POST">
    @csrf

    <label>Môn học:</label>
    <select name="subject_id" id="subjectSelect">
        @foreach($subjects as $s)
            <option value="{{ $s->id }}" data-mamh="{{ $s->maMh }}">
                {{ $s->tenMh }} ({{ $s->maMh }})
            </option>
        @endforeach
    </select>

    <label>Giảng viên:</label>
    <select name="teacher_id">
        @foreach($teachers as $t)
            <option value="{{ $t->id }}">{{ $t->name }}</option>
        @endforeach
    </select>

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

<hr>

{{-- ================== DANH SÁCH PHÂN CÔNG ================== --}}
<h2>Danh sách phân công</h2>
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
        <th>Môn học</th>
        <th>Nhóm</th>
        <th>Giảng viên</th>
        <th>Hành động</th>
    </tr>

    @foreach($subjects as $s)
        @if($s->teacher_id && $s->group_id)
        <tr>
            <td>{{ $s->tenMh }} ({{ $s->maMh }})</td>
            <td>{{ $s->group->tenNhom ?? '—' }}</td>
            <td>{{ $s->teacher->name ?? '—' }}</td>

            <td>
            <button class="btn-edit" onclick="toggleEdit({{ $s->id }})">Sửa</button>
                {{-- ===== XÓA ===== --}}
                <form method="POST" action="{{ route('admin.assign.delete', $s->id) }}" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button class="btn-delete">Xoá</button>
                </form>

                {{-- ===== SỬA (hiện form ngay tại dòng này) ===== --}}
                
            </td>
        </tr>

        {{-- ==== FORM SỬA (ẨN/HIỆN) ==== --}}
        <tr id="editRow{{ $s->id }}" style="display:none; background:#fafafa;">
            <td colspan="4">
                <form method="POST" action="{{ route('admin.assign.update', $s->id) }}">
                    @csrf @method('PUT')

                    <label>Giảng viên:</label>
                    <select name="teacher_id">
                        @foreach($teachers as $t)
                            <option value="{{ $t->id }}" 
                                @if($t->id == $s->teacher_id) selected @endif>
                                {{ $t->name }}
                            </option>
                        @endforeach
                    </select>

                    <label>Nhóm:</label>
                    <select name="group_id">
                        @foreach($groups as $g)
                            @if($g->maMh == $s->maMh)
                                <option value="{{ $g->id }}"
                                    @if($g->id == $s->group_id) selected @endif>
                                    {{ $g->tenNhom }} ({{ $g->maMh }})
                                </option>
                            @endif
                        @endforeach
                    </select>

                    <button type="submit">Lưu</button>
                    <button type="button" onclick="toggleEdit({{ $s->id }})">Huỷ</button>
                </form>
            </td>
        </tr>
        @endif
    @endforeach
</table>


</body>

<script>
// ===== Lọc nhóm theo môn học =====
document.getElementById('subjectSelect').addEventListener('change', function () {
    let selectedMaMh = this.options[this.selectedIndex].dataset.mamh;

    document.querySelectorAll('#groupSelect option').forEach(opt => {
        opt.style.display = (opt.dataset.mamh === selectedMaMh) ? "block" : "none";
    });
});

// Trigger lọc khi tải trang
document.getElementById('subjectSelect').dispatchEvent(new Event('change'));

// ===== SHOW/HIDE form sửa =====
function toggleEdit(id) {
    let row = document.getElementById('editRow' + id);
    row.style.display = row.style.display === 'none' ? 'table-row' : 'none';
}
</script>

</html>
