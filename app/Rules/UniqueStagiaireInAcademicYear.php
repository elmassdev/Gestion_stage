<?php

namespace App\Rules;
use App\Models\Stagiaire;

use Illuminate\Contracts\Validation\Rule;

class UniqueStagiaireInAcademicYear implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */

    public function passes($attribute, $value)
    {
        $currentDateDebut = request()->input('date_debut'); // Adjust this based on your actual request data
        $currentYear = date('Y', strtotime($currentDateDebut));
        $currentMonth = date('n', strtotime($currentDateDebut));
        $currentAcademicYear = ($currentMonth >= 9) ? $currentYear + 1 : $currentYear;

        $existingStagiaire = Stagiaire::where('cin', $value)
            ->whereYear('date_debut', $currentAcademicYear)
            ->where('id', '!=', request()->route('stagiaire')) // Exclude the current record if updating
            ->first();

        return !$existingStagiaire;
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Le stagiaire a droit à un seul stage dans pendant une année académique.';
    }
}
