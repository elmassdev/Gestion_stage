<?php

namespace App\Http\Controllers;

use App\Models\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class SignatureController extends Controller
{
    /**
     * Display a listing of the signatures.
     *
     * @return \Illuminate\Http\Response
     */


    public function generateConvocation($id) {
        $user = auth()->user();
        $activeSignature = Signature::where('is_active', true)
            ->where('site', $user->site)
            ->first();
        if (!$activeSignature) {
            return back()->withErrors('No active signature found for your site.');
        }
        return view('layouts.doc', compact('activeSignature'));
    }



     public function index()
    {
        $signatures = Signature::orderBy('created_at', 'desc')->get();
        return view('signatures.index', compact('signatures'));
    }

    public function create()
    {
        return view('signatures.create');
    }


    public function store(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'head1' => 'required|string|max:255',
            'head2' => 'required|string|max:255',
            'head3' => 'required|string|max:255',
            'head4' => 'required|string|max:255',
            'sign1' => 'required|string|max:255',
            'sign2' => 'required|string|max:255',
            'sign_op' => 'required|string|max:255',
            'sigle' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'Fax' => 'required|string|max:20',
            'site' => 'required|string|max:20',
            'is_active' => 'nullable|boolean',
            'effective_date' => 'required|date',
        ]);
        $isActive = $request->has('is_active') ? true : false;
        if ($isActive) {
            Signature::where('is_active', true)->where('site', $user->site)->update(['is_active' => false]);
        }

        $signature = new Signature();
        $signature->head1 = $request->head1;
        $signature->head2 = $request->head2;
        $signature->head3 = $request->head3;
        $signature->head4 = $request->head4;
        $signature->sign1 = $request->sign1;
        $signature->sign2 = $request->sign2;
        $signature->sign_op = $request->sign_op;
        $signature->sigle = $request->sigle;
        $signature->phone = $request->phone;
        $signature->Fax = $request->Fax;
        $signature->site = $request->site;
        $signature->is_active = $isActive;
        $signature->effective_date = $request->effective_date;

        if ($request->hasFile('logo')) {
            $fileName = time() . '.' . $request->logo->extension();
            $request->file('logo')->storeAs('images/logos/', $fileName,'public');
            $requestData["logo"] = $fileName;
            $signature->logo = $requestData["logo"];
        }

    $signature->save();

    return redirect()->route('signatures.index')->with('success', 'Signature ajoutée.');
}


    public function edit($id)
    {
        $signature = Signature::findOrFail($id);
        return view('signatures.edit', compact('signature'));
    }


    public function update(Request $request, $id){
        $signature = Signature::findOrFail($id);
        $isActive = $request->has('is_active');
        $logoPath = $signature->logo;

        if ($request->hasFile('logo')) {
            if ($logoPath && Storage::disk('public')->exists('images/logos/' . $logoPath)) {
                Storage::disk('public')->delete('images/logos/' . $logoPath);
            }
            $fileName = time() . '.' . $request->logo->extension();
            $request->file('logo')->storeAs('images/logos', $fileName, 'public');
            $logoPath = $fileName;
        }else{
            $logoPath=$signature->logo;
        }
        $signature->update([
            'logo' => $logoPath,
            'head1' => $request->head1,
            'head2' => $request->head2,
            'head3' => $request->head3,
            'head4' => $request->head4,
            'sign1' => $request->sign1,
            'sign2' => $request->sign2,
            'sign_op' => $request->sign_op,
            'sigle' => $request->sigle,
            'phone' => $request->phone,
            'Fax' => $request->Fax,
            'site' => $request->site,
            'is_active' => $isActive,
            'effective_date' => $request->effective_date,
        ]);

    return redirect()->route('signatures.index')->with('success', 'Signature mise à jour.');
}



    public function destroy($id)
    {
        $signature = Signature::findOrFail($id);

        if ($signature->logo) {
            Storage::disk('public')->delete($signature->logo);
        }
        $signature->delete();

        return redirect()->route('signatures.index')->with('success', 'Signature supprimée.');
    }


}
