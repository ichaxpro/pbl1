<?php

namespace App\Http\Controllers;

use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::where('status', 'approved_by')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profil_activity', compact('activities'));
    }
}
