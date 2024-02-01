<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

class EtablissementsExport implements FromQuery
{
    use Exportable;
    public $title = 'etab Data';

    public function query()
    {
        // Select all columns from the 'etablissements' table
        return DB::table('etablissements')->orderBy('id');
    }
}
