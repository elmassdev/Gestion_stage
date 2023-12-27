<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;
    protected $table = 'stagiaires';
    protected $primaryKey = 'id';
    protected $fillable = ['code', 'date_demande','site', 'civilite','prenom', 'nom', 'cin','phone','email','photo', 'niveau','diplome','filiere','etablissement','ville','type_stage', 'service','encadrant', 'date_debut','date_fin','sujet','remunere','EI','type_formation','annule','observation','dateLO','date_reception_FFS','date_Att_etablie','OP_etabli','OP_etabli_le','indemnite_remise_le','absence','Attestation_remise_le','Att_remise_a', 'created_by','edited_by'];
}


