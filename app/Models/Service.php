<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'id';
    protected $primaryKey = 'sigle_service';
    protected $fillable = ['sigle_service','libelle','entite','site','direction','EPI'];

}
