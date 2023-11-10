<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $table = 'villes';
    protected $primaryKey = 'ville';
    protected $fillable = ['ville','pays'];
}
