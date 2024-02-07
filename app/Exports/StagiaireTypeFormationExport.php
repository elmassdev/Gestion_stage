<?php

namespace App\Exports;

use App\Models\Stagiaire;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class StagiaireTypeFormationExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $year = 2024; // Replace this with your desired year
        return Stagiaire::select('type_formation', DB::raw('COUNT(*) as count'))
            ->whereYear('date_debut', $year)
            ->groupBy('type_formation')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Type Formation',
            'Nombre stagiaires',
        ];
    }
}
