<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityPublicController extends Controller
{
    public function show(Request $request, $id)
    {
        $query = Activity::where('id', $id);

        // Allow preview for authenticated users when preview param present
        $isPreview = $request->has('preview') && auth()->check();
        if (!$isPreview) {
            $query->where('status', 'accepted');
        }

        $activity = $query->firstOrFail();

        return view('activities.show', compact('activity', 'isPreview'));
    }
}
