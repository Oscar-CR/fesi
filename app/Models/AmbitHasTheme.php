<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbitHasTheme extends Model
{
    use HasFactory;

    public $table = 'ambit_has_theme';

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'theme_id');
    }

    public function ambit()
    {
        return $this->belongsTo(Ambit::class, 'ambit_id');
    }
}
