<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'maMh',
        'tenMh',
        'SoTC',
        'group_id',
        'teacher_id',
    ];

    // --- Quan hệ ---

    // Môn học thuộc nhóm
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    // Môn học do giảng viên dạy
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    // Môn học có nhiều điểm
    public function scores()
    {
        return $this->hasMany(Score::class, 'subject_id');
    }
    

    // Nếu bạn vẫn giữ score_detail
    public function score_details()
    {
        return $this->hasMany(Score_detail::class, 'subject_id');
    }
}
