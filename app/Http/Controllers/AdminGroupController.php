<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\Group_detail;
use Illuminate\Http\Request;

class AdminGroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        $students = User::where('role','student')->get();
        return view('admin.group', compact('groups','students'));
    }

   public function addStudent(Request $request)
{
    $request->validate([
        'group_id' => 'required',
        'user_id' => 'required'
    ]);

    Group_detail::create([
        'group_id' => $request->group_id,
        'user_id' => $request->user_id
    ]);

    return back()->with('success', 'Đã thêm sinh viên vào lớp!');
}

}
