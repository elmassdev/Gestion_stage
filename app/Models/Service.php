<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $casts = [
        'sigle_service' => 'string',
    ];

    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $fillable = ['sigle_service','libelle','entite','site','direction','EPI'];

}
