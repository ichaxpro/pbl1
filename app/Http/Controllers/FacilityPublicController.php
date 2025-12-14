<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityPublicController extends Controller
{
    public function show(Request $request, $id)
    {
        $query = Facility::where('id', $id);

        // Allow preview for authenticated admin/operator when preview param present
        $isPreview = $request->has('preview') && auth()->check();
        if (!$isPreview) {
            $query->where('status', 'accepted');
        }

        $facility = $query->firstOrFail();

        return view('facilities.show', compact('facility', 'isPreview'));
    }
}
