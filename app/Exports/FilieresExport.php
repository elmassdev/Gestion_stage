<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

class FilieresExport implements FromQuery
{
    use Exportable;
    public $title = 'Filieres Data';

    public function query()
    {
        // Select all columns from the 'filieres' table
        return DB::table('filieres')->orderBy('id');
    }
}
