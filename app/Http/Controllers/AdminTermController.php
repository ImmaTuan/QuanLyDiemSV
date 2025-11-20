<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\Http\Request;

class AdminTermController extends Controller
{
    public function index()
    {
        $terms = Term::all();
        return view('admin.term', compact('terms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|integer',
            'semester' => 'required|integer|min:1|max:2',
        ]);

        Term::create($request->only('year'));

        return back()->with('success', 'Đã thêm năm học thành công!');
    }
}
