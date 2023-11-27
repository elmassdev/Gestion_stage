<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    protected $casts = [
        'sigle_etab' => 'string',
    ];

    use HasFactory;
    protected $table = 'etablissements';
    protected $primaryKey = 'sigle_etab';
    protected $fillable = ['sigle_etab','etab','statut', 'type','article','pays'];
}
