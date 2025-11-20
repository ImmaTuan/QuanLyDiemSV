<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Subject;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;


class AdminAssignController extends Controller
{
    public function index()
    {
        $teachers = User::where('role', 'teacher')->get();
        $subjects = Subject::with('teacher','term')->get();
        $groups = Group::all();

        return view('admin.assign', compact('teachers','subjects','groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required',
            'teacher_id' => 'required',
            'group_id' => 'required',
        ]);

        $subject = Subject::findOrFail($request->subject_id);

        $subject->update([
            'teacher_id' => $request->teacher_id,
            'group_id' => $request->group_id,
        ]);

        return back()->with('success', 'Đã phân công giảng dạy!');
    }
    

}

