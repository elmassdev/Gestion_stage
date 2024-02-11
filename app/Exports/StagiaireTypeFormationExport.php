<?php

namespace App\Exports;

use App\Models\Stagiaire;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class StagiaireTypeFormationExport implements FromCollection, WithHeadings
{
    protected $year;

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function collection()
    {
        $results = Stagiaire::select(
                'type_formation',
                DB::raw('COUNT(*) as count'),
                DB::raw('SUM(DATEDIFF(date_fin, date_debut) + 1 -
                          (DATEDIFF(date_fin, date_debut) + 1) DIV 7 * 2 -
                          IF(WEEKDAY(date_debut) = 5, 1, 0) -
                          IF(WEEKDAY(date_fin) = 6, 1, 0)) AS days')
            )
            ->whereYear('date_debut', $this->year)
            ->leftJoin('holidays', function ($join) {
                $join->on(DB::raw('DATE(date_debut)'), '=', DB::raw('DATE(holidays.created_at)'))
                     ->orOn(DB::raw('DATE(date_fin)'), '=', DB::raw('DATE(holidays.created_at)'));
            })
            ->groupBy('type_formation')
            ->get();

        return $results->map(function ($result) {
            return [
                'type_formation' => $result->type_formation,
                'nombre_stagiaires' => $result->count,
                'nombre_jours_stage' => $result->days,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Type Formation',
            'Nombre stagiaires',
            'nombre jours stage',
        ];
    }
}
