<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Visite;

class VisiteController extends Controller
{
    public function index()
    {
        $visites = Visite::all();
        $stats = Visite::select(
            DB::raw('YEAR(date_visite) as year'),
            DB::raw('COUNT(*) as number_of_visits'),
            DB::raw('SUM(effectif) as total_effectif')
        )
        ->groupBy('year')
        ->orderBy('year', 'asc')
        ->get();

        // Pass the statistics to the index view
        return view('visites.index', compact('visites', 'stats'));
    }

    public function create()
    {
        return view('visites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_demande' => 'required|date',
            'date_visite' => 'required|date',
            'demandeur' => 'required|string|max:255',
            'effectif' => 'required|integer',
            'destination' => 'required|string|max:255',
            'annule' => 'required|boolean',
        ]);

        Visite::create($request->all());

        return redirect()->route('visites.index');
    }

    public function edit(Visite $visite)
    {
        return view('visites.edit', compact('visite'));
    }

    public function update(Request $request, Visite $visite)
    {
        $request->validate([
            'date_demande' => 'required|date',
            'date_visite' => 'required|date',
            'demandeur' => 'required|string|max:255',
            'effectif' => 'required|integer',
            'destination' => 'required|string|max:255',
            'annule' => 'required|boolean',
        ]);

        $visite->update($request->all());

        return redirect()->route('visites.index');
    }
    public function destroy($id)
    {
        $visite = Visite::findOrFail($id);
        $visite->delete();

        return redirect()->route('visites.index');
    }

}
