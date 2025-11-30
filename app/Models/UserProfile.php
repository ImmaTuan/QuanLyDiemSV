<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'ho_ten',
        'gioi_tinh',
        'so_dien_thoai',
        'dia_chi',
        'que_quan',
        'ngay_sinh'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
