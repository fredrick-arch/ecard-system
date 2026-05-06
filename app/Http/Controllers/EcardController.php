<?php

namespace App\Http\Controllers;

use App\Models\Ecard;
use Illuminate\Http\Request;

class EcardController extends Controller
{
    public function history()
    {
        $ecards = Ecard::forUser()
                    ->latest()
                    ->get();

        return view('ecards.history', compact('ecards'));
    }

    public function show($id)
    {
        $ecard = Ecard::forUser()
                    ->where('id', $id)
                    ->firstOrFail();

        return view('ecards.show', compact('ecard'));
    }

    public function destroy($id)
    {
        $ecard = Ecard::findOrFail($id);
        $ecard->delete();

        return redirect()->back()->with('success', 'E-Card imefutwa');
    }

    /**
     * Scan QR Code (Public Page)
     */
    public function scan($code)
    {
        $ecard = Ecard::where('unique_code', $code)->first();

        if (!$ecard) {
            return view('scan.invalid');   // Tutatengeneza baadaye
        }

        // Ikiwa imeshascan hapo awali
        if ($ecard->scanned) {
            return view('scan.already_scanned', compact('ecard'));
        }

        // Scan kwa mara ya kwanza
        $ecard->update([
            'scanned'      => true,
            'scanned_at'   => now(),
            'scanned_by'   => Auth::check() ? Auth::id() : null,
            'scan_count'   => $ecard->scan_count + 1,
        ]);

        return view('scan.success', compact('ecard'));
    }
}