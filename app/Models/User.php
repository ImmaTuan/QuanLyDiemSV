<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'MaSV',
        'MaGV',
        'name',
        'email',
        'role',
        'password',
        'class_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // --- Quan hệ ---

    // Một sinh viên có thể có nhiều điểm
    public function scores()
    {
        return $this->hasMany(Score::class, 'user_id');
    }

    // Một giảng viên có thể dạy nhiều môn
    public function subjects()
    {
        return $this->hasMany(Subject::class, 'teacher_id');
    }

    // Thuộc về một lớp
    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    // Sinh viên nằm trong các nhóm
    public function group_details()
    {
        return $this->hasMany(Group_detail::class, 'user_id');
    }
    public function profile()
{
    return $this->hasOne(UserProfile::class);
}

}
