<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encadrant extends Model
{
    use HasFactory;
    protected $table = 'encadrants';
    protected $primaryKey = 'id';
    protected $fillable = ['titre','nom','prenom', 'phone','email','service'];
}
