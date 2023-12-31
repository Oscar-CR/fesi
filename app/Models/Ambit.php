<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambit extends Model
{
    use HasFactory;
    
    public $table = 'ambits';

    public function ambitHasTheme()
    {
        return $this->hasMany(AmbitHasTheme::class, 'ambit_id');
    }

    
}
