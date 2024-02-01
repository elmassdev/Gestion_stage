<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

class StagiairesExport implements FromQuery
{
    use Exportable;
    public $title = 'Stagiaires Data';

    public function query()
    {
        // Select all columns from the 'stagiaires' table
        return DB::table('stagiaires')->orderBy('id');
    }
}

