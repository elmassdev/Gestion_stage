<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

class ServicesExport implements FromQuery
{
    use Exportable;
    public $title = 'Services Data';

    public function query()
    {
        return DB::table('services')->orderBy('id');
    }
}
