<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Facility;
use App\Models\Member;

class ActivityController extends Controller
{
    // Untuk tab /profile/activity
    public function index()
    {
        $activities = Activity::where('status', 'accepted')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profile.profile_activities', compact('activities'));
    }

public function profile()
{
    $activities = Activity::where('status', 'accepted')->get();
    $facilities = Facility::where('status', 'accepted')->get();

    // Head Lab (HANYA ACTIVE)
    $head = Member::where('status', 'active')
        ->whereHas('position', fn ($q) => $q->where('name', 'Head Lab'))
        ->first();

    // Researchers (HANYA ACTIVE)
    $researchers = Member::where('status', 'active')
        ->whereHas('position', fn ($q) => $q->where('name', 'Researcher'))
        ->get();

    return view('profile.profile_page', compact(
        'activities',
        'facilities',
        'head',
        'researchers'
    ));
}

}
