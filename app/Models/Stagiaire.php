<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Stagiaire extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::saving(function ($stagiaire) {
            $currentDateDebut = $stagiaire->date_debut;

            $currentYear = date('Y', strtotime($currentDateDebut));
            $currentMonth = date('n', strtotime($currentDateDebut));

            $currentAcademicYear = ($currentMonth >= 9) ? $currentYear + 1 : $currentYear;

            $existingStagiaire = self::where('cin', $stagiaire->cin)
                ->where(function ($query) use ($currentAcademicYear) {
                    $query->whereYear('date_debut', $currentAcademicYear)
                        ->orWhere(function ($query) use ($currentAcademicYear) {
                            $query->whereYear('date_debut', $currentAcademicYear - 1)
                                ->whereMonth('date_debut', '>', 8); // Month greater than August
                        });
                })
                ->where('id', '!=', $stagiaire->id)
                ->first();

            if ($existingStagiaire) {
                $existDateDebut = $existingStagiaire->date_debut;
                $existYear = date('Y', strtotime($existDateDebut));
                $existMonth = date('n', strtotime($existDateDebut));
                $existAcademicYear = ($existMonth >= 9) ? $existYear + 1 : $existYear;

                if ($existAcademicYear == $currentAcademicYear) {
                    throw new \Exception('Le stagiaire a droit à un seul stage pendant une année académique!');
                }
            }
        });
    }

    use HasFactory;
    protected $table = 'stagiaires';
    protected $primaryKey = 'id';
    protected $fillable = ['code', 'date_demande','site', 'civilite','prenom', 'nom', 'cin','phone','email','photo', 'niveau','diplome','filiere','etablissement','ville','type_stage', 'service','encadrant', 'date_debut','date_fin','sujet','remunere','EI','type_formation','annule','observation','dateLO','date_reception_FFS','date_Att_etablie','OP_etabli','OP_etabli_le','indemnite_remise_le','absence','Attestation_remise_le','Att_remise_a', 'created_by','edited_by'];
}


