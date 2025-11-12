<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'hocKy',
        'diemck',
        'diemgk',
        'user_id',
        'subject_id',
    ];

    // --- Quan hệ ---

    // Điểm thuộc về sinh viên nào
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Điểm thuộc về môn học nào
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    // Nếu bạn giữ bảng score_detail (liên kết chi tiết hơn)
    public function score_details()
    {
        return $this->hasMany(Score_detail::class, 'score_id');
    }
}
