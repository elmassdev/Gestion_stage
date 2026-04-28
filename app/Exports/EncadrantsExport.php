<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

class EncadrantsExport implements FromQuery
{
    use Exportable;
    public $title = 'encadrants Data';


    public function query()
    {
        return DB::table('encadrants')->orderBy('id');
    }
}
