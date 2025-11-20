<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    // Trang xem điểm
    public function index(Request $request)
    {
        $user = Auth::user();

        // --- Nếu là sinh viên ---
    if ($user->role === 'student') {
      $scores = Score::with(['subject.term'])
    ->where('user_id', $user->id)
    ->get();


     return view('students.score', compact('user', 'scores'));
    }


        // --- Nếu là giảng viên ---
        if ($user->role === 'teacher') {
            // Lấy danh sách nhóm mà giảng viên đang dạy
            $groups = Group::whereHas('subjects', function ($query) use ($user) {
                $query->where('teacher_id', $user->id);
            })->get();

            // Query điểm của các sinh viên trong các môn do giảng viên này dạy
            $query = Score::with(['subject.group', 'student'])
                ->whereHas('subject', function ($q) use ($user) {
                    $q->where('teacher_id', $user->id);
                });

            // Nếu có chọn nhóm lọc
            if ($request->has('group_id') && $request->group_id != '') {
                $query->whereHas('subject', function ($q) use ($request) {
                    $q->where('group_id', $request->group_id);
                });
            }

            $scores = $query->get();

            return view('teachers.score', compact('user', 'scores', 'groups'));
        }

        return redirect()->back()->with('error', 'Bạn không có quyền truy cập!');
    }

    // --- Trang sửa điểm ---
    public function edit($id)
    {
        $score = Score::with(['student', 'subject'])->findOrFail($id);
        $user = Auth::user();

        // Chỉ giảng viên được phép sửa
        if ($user->role !== 'teacher') {
            return redirect()->route('scores.index')->with('error', 'Bạn không có quyền chỉnh sửa điểm.');
        }

        // Giảng viên chỉ được sửa điểm của môn do chính họ dạy
        if ($score->subject->teacher_id !== $user->id) {
            return redirect()->route('scores.index')->with('error', 'Bạn không được phép sửa điểm môn này.');
        }

        return view('teachers.edit_score', compact('score'));
    }

    // --- Cập nhật điểm ---
    public function update(Request $request, $id)
    {
        $score = Score::with('subject')->findOrFail($id);
        $user = Auth::user();

        // Bảo vệ: chỉ giảng viên được phép
        if ($user->role !== 'teacher' || $score->subject->teacher_id !== $user->id) {
            return redirect()->route('scores.index')->with('error', 'Bạn không có quyền chỉnh sửa điểm này.');
        }

        // Validate dữ liệu
        $request->validate([
            'diemgk' => 'required|numeric|min:0|max:10',
            'diemck' => 'required|numeric|min:0|max:10',
        ]);

        // Cập nhật điểm
        $score->update([
            'diemgk' => $request->diemgk,
            'diemck' => $request->diemck,
        ]);

        return redirect()->route('scores.index')->with('success', 'Cập nhật điểm thành công!');
    }
}
