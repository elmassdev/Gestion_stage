<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;
    protected $table = 'stagiaires';
    protected $primaryKey = 'id';
    protected $fillable = ['code', 'date_demande','site', 'civilite','prenom', 'nom', 'cin','phone','email','photo', 'niveau','diplome','filiere','etablissement','ville','type_stage', 'service','encadrant', 'date_debut','date_fin','sujet','remunere','EI','annule','prolongation','Attestation_remise','Att_remise_a'];
}


