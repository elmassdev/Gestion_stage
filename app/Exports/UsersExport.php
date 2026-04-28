<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromQuery
{
    use Exportable;
    public $title = 'Users Data';

    public function query()
    {
        return DB::table('users')->orderBy('id');
    }
}
