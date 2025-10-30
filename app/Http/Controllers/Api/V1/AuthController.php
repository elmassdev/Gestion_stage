<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'titre'     => 'nullable|string|max:10',
            'prenom'    => 'required|string|max:255',
            'nom'       => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users,email',
            'password'  => 'required|string|min:6|confirmed',
            'site'      => 'nullable|string|max:255',
            'service'   => 'nullable|string|max:255',
        ]);

        $user = User::create([
            'titre'     => $data['titre'] ?? null,
            'prenom'    => $data['prenom'],
            'nom'       => $data['nom'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
            'site'      => $data['site'] ?? null,
            'service'   => $data['service'] ?? null,
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
        'user'  => [
            'id'     => $user->id,
            'prenom' => $user->prenom,
            'nom'    => $user->nom,
            'email'  => $user->email,
            'site'   => $user->site,
            'service'=> $user->service,
        ],
        'token' => $token,
    ]);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // optionally delete previous tokens: $user->tokens()->delete();
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        // delete current access token
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out'], 200);
    }
}
