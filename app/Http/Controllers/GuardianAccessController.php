<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;
use App\Models\GuardianScan;
use Illuminate\View\View;

class GuardianAccessController extends Controller
{
    public function showForm()
    {
        return view('guardians.access');
    }

    public function verify(Request $request)
    {
        $identifier = $request->input('identifier');

        $guardian = Guardian::where('qr_code', $identifier)
                          ->orWhere('pin', $identifier)
                          ->first();

        if (!$guardian) {
            return back()->with('error', 'Identificador inválido');
        }

        $identifierType = strlen($identifier) === 4 ? 'pin' : 'qr_code';

        GuardianScan::create([
            'guardian_id' => $guardian?->id ?? null,
            'identifier_used' => $identifier,
            'identifier_type' => $identifierType,
            'success' => (bool) $guardian,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        return redirect()->route('guardian.profile', $guardian);
    }

    public function profile(Guardian $guardian)
    {
        return view('guardians.profile', compact('guardian'));
    }

    public function kioskIdle(): View
    {
        return view('kiosk.idle');
    }

    public function kioskCheckLogs()
    {
        $log = GuardianScan::latest()->first();

        if ($log && $log->created_at->gt(now()->subSeconds(25))) {
            $guardian = $log->guardian;
            return redirect()->route('kiosk.profile', $guardian);
        }

        return redirect()->route('kiosk.idle');
    }

    public function kioskProfile(Guardian $guardian)
    {
        return view('kiosk.guardian-profile', compact('guardian'));
    }


}
