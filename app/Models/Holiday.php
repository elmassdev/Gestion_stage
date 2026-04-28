<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'Hday', 'Hmonth'];

    public function isHoliday($date)
    {
        return Holiday::where('Hday', date('j', strtotime($date)))
                      ->where('Hmonth', date('n', strtotime($date)))
                      ->exists();
    }
}
