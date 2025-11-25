<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'maMh',
        'MaNhom',
        'tenNhom',
        'hocky',
    ];

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'group_id');
    }

    public function group_details()
    {
        return $this->hasMany(Group_detail::class, 'group_id');
    }
    public function subject()
{
    return $this->belongsTo(Subject::class, 'maMh', 'maMh');
}


}
