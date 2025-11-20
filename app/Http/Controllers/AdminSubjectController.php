<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Subject;
use App\Models\Term;
use App\Models\User;
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
}
