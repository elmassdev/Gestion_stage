<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_demande',
        'date_visite',
        'demandeur',
        'effectif',
        'destination',
        'annule',
    ];


}
