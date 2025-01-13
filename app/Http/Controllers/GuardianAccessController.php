<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;

class GuardianAccessController extends Controller
{
    public function showForm()
    {
        return view('guardians.access');
    }

    public function verify(Request $request)
    {
        $identifier = $request->input('identifier');

        // Try to find guardian by QR code or PIN
        $guardian = Guardian::where('qr_code', $identifier)
                          ->orWhere('pin', $identifier)
                          ->first();

        if (!$guardian) {
            return back()->with('error', 'Identificador inválido');
        }

        return redirect()->route('guardian.profile', $guardian);
    }

    public function profile(Guardian $guardian)
    {
        return view('guardians.profile', compact('guardian'));
    }

}
