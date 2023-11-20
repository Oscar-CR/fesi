<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    public $table = 'themes';

    public function themeHasCourse() {
        return $this->hasMany(ThemeHasCourse::class, 'course_id');
    }
}
