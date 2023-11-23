<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $table = 'courses';
    protected $fillable = [
        'name',
        'date_test',
        'school_shift',
        'classroom',
        'start',
        'end',
        'introduction',
        'general_criteria',
        'documents',
        'works',
        'work_criteria',
        'work_requeriment',
        'evaluation_criteria',
        'theme_references',
        'suggestion',
        'other',
    ];

}
