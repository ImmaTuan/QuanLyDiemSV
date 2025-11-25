<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý môn học</title>
    <link rel="stylesheet" href="{{ auto_asset('css/admincompo.css') }}">

    <script>
        function toggleEdit(id) {
            const row = document.getElementById("editRow" + id);
            row.style.display = row.style.display === "none" ? "table-row" : "none";
        }
    </script>
</head>
<body>

<h2>Quản Lý Môn Học</h2>
<a href="{{ route('admin.dashboard') }}" class="back-btn">Quay lại</a>


<form method="POST" action="{{ route('admin.subjects.store') }}">
    @csrf
    <input name="maMh" placeholder="Mã môn" required>
    <input name="tenMh" placeholder="Tên môn" required>
    <input name="SoTC" placeholder="Số tín chỉ" type="number" required>

    <select name="term_id" required>
        @foreach ($terms as $tm)
            <option value="{{ $tm->id }}">{{ $tm->year }} - HK{{ $tm->semester }}</option>
        @endforeach
    </select>

    <button type="submit">Thêm môn</button>
</form>

<hr>

<h2>Danh sách môn học</h2>
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
<table border="1" cellpadding="8" width="100%">
    <tr>
        <th>Mã MH</th>
        <th>Tên môn</th>
        <th>Số TC</th>
        <th>Năm học - HK</th>
        <th>Hành động</th>
    </tr>

    @foreach($subjects as $s)
        <tr>
            <td>{{ $s->maMh }}</td>
            <td>{{ $s->tenMh }}</td>
            <td>{{ $s->SoTC }}</td>
            <td>{{ $s->term->year }} - HK{{ $s->term->semester }}</td>

            <td>
            <button class="btn-edit" onclick="toggleEdit({{ $s->id }})">Sửa</button>

                <form action="{{ route('admin.subjects.delete', $s->id) }}" 
                      method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button class="btn-delete">Xoá</button>
                </form>
            </td>
        </tr>

        {{-- ==== FORM SỬA ẨN/HIỆN ==== --}}
        <tr id="editRow{{ $s->id }}" style="display:none; background:#fafafa;">
            <td colspan="5">
                <form method="POST" action="{{ route('admin.subjects.update', $s->id) }}">
                    @csrf
                    @method('PUT')

                    <label>Mã môn:</label>
                    <input name="maMh" value="{{ $s->maMh }}" required>

                    <label>Tên môn:</label>
                    <input name="tenMh" value="{{ $s->tenMh }}" required>

                    <label>Số TC:</label>
                    <input name="SoTC" type="number" value="{{ $s->SoTC }}" required>

                    <label>Học kỳ:</label>
                    <select name="term_id" required>
                        @foreach ($terms as $tm)
                            <option value="{{ $tm->id }}"
                                @if($tm->id == $s->term_id) selected @endif>
                                {{ $tm->year }} - HK{{ $tm->semester }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit">Lưu</button>
                    <button type="button" onclick="toggleEdit({{ $s->id }})">
                        Huỷ
                    </button>
                </form>
            </td>
        </tr>

    @endforeach
</table>

</body>
</html>
