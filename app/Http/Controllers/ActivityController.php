<?php

namespace App\Http\Controllers;

use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::where('status', 'accepted')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profile.profile_activities', compact('activities'));
    }
}

