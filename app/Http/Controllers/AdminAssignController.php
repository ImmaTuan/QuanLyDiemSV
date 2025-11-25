<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAssignController extends Controller
{
    public function index()
    {
        $teachers = User::where('role', 'teacher')->get();
        $subjects = Subject::with('teacher','term')->get();
        $groups   = Group::with('subject')->get();

        return view('admin.assign', compact('teachers','subjects','groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required',
            'teacher_id' => 'required',
            'group_id' => 'required',
        ]);

        Subject::findOrFail($request->subject_id)->update([
            'teacher_id' => $request->teacher_id,
            'group_id'   => $request->group_id,
        ]);

        return back()->with('success', 'Đã phân công giảng dạy!');
    }

    public function edit($id)
    {
        $assignment = Subject::findOrFail($id);

        $teachers = User::where('role','teacher')->get();
        $subjects = Subject::all();
        $groups   = Group::with('subject')->get();

        return view('admin.assign_edit', compact('assignment','teachers','subjects','groups'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'teacher_id' => 'required',
            'group_id'   => 'required',
        ]);

        Subject::findOrFail($id)->update([
            'teacher_id' => $request->teacher_id,
            'group_id'   => $request->group_id,
        ]);

        return redirect()->route('admin.assign')->with('success','Cập nhật thành công!');
    }

    public function delete($id)
    {
        Subject::findOrFail($id)->update([
            'teacher_id' => null,
            'group_id'   => null,
        ]);

        return back()->with('success', 'Đã xoá phân công!');
    }
}
