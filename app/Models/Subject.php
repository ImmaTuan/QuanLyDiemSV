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
        'term_id',     
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function scores()
    {
        return $this->hasMany(Score::class, 'subject_id');
    }

    public function score_details()
    {
        return $this->hasMany(Score_detail::class, 'subject_id');
    }

    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id');
    }
    public function groups()
{
    return $this->hasMany(Group::class, 'maMh', 'maMh');
}

}
