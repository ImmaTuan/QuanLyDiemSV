<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Subject;
use App\Models\Term;
use Illuminate\Http\Request;

class AdminSubjectController extends Controller
{
    public function index()
    {
        $terms = Term::all();
        $groups = Group::all();
        $subjects = Subject::with('term')->get();

        return view('admin.subject', compact('terms','groups','subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'maMh' => 'required',
            'tenMh' => 'required',
            'SoTC' => 'required|integer',
            'term_id' => 'required',
        ]);

        Subject::create($request->all());

        return back()->with('success', 'Đã thêm môn học!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'maMh' => 'required',
            'tenMh' => 'required',
            'SoTC' => 'required|integer',
            'term_id' => 'required',
        ]);

        $subject = Subject::findOrFail($id);

        $subject->update($request->all());

        return back()->with('success', 'Đã cập nhật môn học!');
    }

    public function delete($id)
    {
        Subject::findOrFail($id)->delete();

        return back()->with('success', 'Đã xoá môn học!');
    }
}
