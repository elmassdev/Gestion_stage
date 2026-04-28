<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\StagiaireResource;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireApiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user(); // via sanctum
        $query = Stagiaire::query();

        // If you use 'site' on users and stagiaires:
        if ($user && isset($user->site)) {
            $query->where('site', $user->site);
        }

        return StagiaireResource::collection($query->orderBy('code', 'desc')->paginate(10));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:20|unique:stagiaires,cin',
            'filiere' => 'required|string',
            'service' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);

        $stagiaire = Stagiaire::create($validated);

        return new StagiaireResource($stagiaire);
    }

    public function show(Stagiaire $stagiaire)
    {
        return new StagiaireResource($stagiaire);
    }

    public function update(Request $request, Stagiaire $stagiaire)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'prenom' => 'sometimes|required|string|max:255',
            'cin' => 'sometimes|required|string|max:20|unique:stagiaires,cin,' . $stagiaire->id,
            'date_debut' => 'sometimes|date',
            'date_fin' => 'sometimes|date|after_or_equal:date_debut',
        ]);

        $stagiaire->update($validated);

        return new StagiaireResource($stagiaire);
    }

    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->delete();

        return response()->json(null, 204);
    }
}
