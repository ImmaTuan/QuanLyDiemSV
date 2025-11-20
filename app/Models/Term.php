<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Term extends Model
{
    protected $fillable = ['year', 'semester'];

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'term_id');
    }

  

    public function getLabelAttribute()
    {
        return $this->year . ' - Học kỳ ' . $this->semester;
    }
}

