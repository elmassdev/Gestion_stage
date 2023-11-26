<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;


Paginator::useBootstrap();

class VilleController extends Controller
{
    public function index()
    {
        $vs= Ville::orderBy('ville', 'asc')->paginate(10);
        return view('villes.index', compact('vs'));
    }

    public function create()
    {
        return view('villes.create');
    }
    public function store(Request $request)
    {
            // Define custom error messages
        $customMessages = [
            'ville.required' => 'Merci d\'entrer le nom de la ville.',
            'ville.unique' => 'Cette ville existe!',
            'pays.required' => 'Merci d\'entrer le nom de payse.',
        ];

        // Validate the request data with custom error messages
        $request->validate([
            'ville' => [
                'required',
                Rule::unique('villes')->where(function ($query) use ($request) {
                    return $query->where('pays', $request->pays);
                }),
            ],
            'pays' => 'required',
        ], $customMessages);

        // Attempt to create the Ville
        $createdVille = Ville::create($request->all());

        // Check if the creation was successful
        if ($createdVille) {
            // Flash a success message to the session
            Session::flash('success', 'Ville created successfully.');
            return redirect()->route('villes.index');
        } else {
            // Flash an error message to the session
            Session::flash('error', 'Failed to create Ville. Please try again.');
            return redirect()->back();
        }
        
    }

    public function edit(Ville $ville)
    {
        return view('villes.edit', compact('ville'));
    }

    public function update(Request $request, Ville $ville)
    {
        $ville->update($request->all());
        return redirect()->route('villes.index');
    }

    public function destroy(Ville $ville)
    {
        $ville->delete();
        return redirect()->route('villes.index');
    }
}
