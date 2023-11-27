<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeHasCourse extends Model
{
    use HasFactory;

    public $table = 'theme_has_course';

    public function course() {

        return $this->belongsTo(Course::class, 'course_id');
    }

    public function theme() {

        return $this->belongsTo(Theme::class, 'theme_id');
    }
}
