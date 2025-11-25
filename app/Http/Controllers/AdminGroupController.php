<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Score;
use App\Models\Subject;
use App\Models\User;
use App\Models\Group_detail;
use Illuminate\Http\Request;

class AdminGroupController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        $groups = Group::with('subject')->get();

        $students = User::where('role', 'student')->get();

        $details = Group_detail::with(['group.subject', 'student'])->get();

        return view('admin.group', compact('subjects','groups','students','details'));
    }


    public function addStudent(Request $request)
    {
        $request->validate([
            'group_id' => 'required',
            'user_id'  => 'required'
        ]);

        // ================================
        // Lấy group & môn học của group
        // ================================
        $group = Group::with('subject')->find($request->group_id);

        if (!$group || !$group->subject) {
            return back()->with('error', 'Không tìm thấy môn học của nhóm!');
        }

        $maMh = $group->subject->maMh;


        // ================================
        // 1. Kiểm tra sinh viên đã có TRONG NHÓM chưa
        // ================================
        $exists = Group_detail::where('group_id', $request->group_id)
            ->where('user_id', $request->user_id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Sinh viên đã nằm trong nhóm này!');
        }


        // ================================
        // 2. Kiểm tra sinh viên đã ở MÔN NÀY chưa (nhóm khác)
        // ================================
        $inSameSubject = Group_detail::where('user_id', $request->user_id)
            ->whereHas('group.subject', function ($q) use ($maMh) {
                $q->where('maMh', $maMh);
            })
            ->exists();

        if ($inSameSubject) {
            return back()->with('error', 'Sinh viên đã có trong môn học này (thuộc nhóm khác)!');
        }


        // ================================
        // 3. Thêm sinh viên vào nhóm
        // ================================
        
            $detail = Group_detail::create([
                'group_id' => $request->group_id,
                'user_id'  => $request->user_id
            ]);

            
            Score::firstOrCreate([
                'user_id'    => $request->user_id,
                'subject_id' => $group->subject->id
            ], [
                'diemck' => null,
                'diemgk' => null
            ]);

            return back()->with('success', 'Đã thêm sinh viên vào nhóm!');

    }


    public function delete($id)
    {
        Group_detail::findOrFail($id)->delete();

        return back()->with('success', 'Đã xoá sinh viên khỏi nhóm!');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'group_id' => 'required',
        ]);

        Group_detail::findOrFail($id)->update([
            'group_id' => $request->group_id,
        ]);

        return back()->with('success', 'Cập nhật thành công!');
    }
}
