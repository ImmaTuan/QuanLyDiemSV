<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score_detail extends Model
{
    protected $fillable = [
        'subject_id',
        'score_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function score()
    {
        return $this->belongsTo(Score::class);
    }
}

