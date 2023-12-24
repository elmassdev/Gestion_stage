<?php

// app/Http/Controllers/ChartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\Charts\Classes\Chart;
use Illuminate\Support\Facades\DB;
use App\Models\Stagiaire;
use Illuminate\Support\Facades\Auth;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ChartController extends Controller
{
    public function StagParEnc()
    {
        $stagiaire = DB::table('stagiaires')
            ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
            ->where('stagiaires.site', '=', Auth::user()->site)
            ->select(DB::raw('count(*) as total, encadrants.nom as nomenc'))
            ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
            ->where('stagiaires.annule', '=', false)
            ->groupBy('nomenc')
            ->orderBy('total','desc')
            ->get();

        $chart_options = [
            'chart_title' => 'stagiaire par encadrants',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Stagiaire',
            'group_by_field' => 'encadrant',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);


        return view('indicators.charts', compact('chart1'));
    }
}
