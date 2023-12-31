<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseHasSinodal extends Model
{
    use HasFactory;

    public $table = 'course_has_sinodal';

    public function sinodals()
    {
        return $this->belongsTo(Sinodal::class, 'sinodal_id');
    }
}
