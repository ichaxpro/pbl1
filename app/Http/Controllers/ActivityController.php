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

    // 🔥 INI YANG KAMU BUTUHKAN
    public function profile()
    {
        $activities = Activity::where('status', 'accepted')
            ->orderBy('created_at', 'desc')
            ->get();

        $facilities = Facility::where('status', 'accepted')->get();

        $members = Member::where('status', 'active')->get();

        // Ambil head lab
        $head = Member::whereHas('position', function ($query) {
            $query->where('name', 'Head Lab');
        })->first();

        // Ambil researchers
        $researchers = Member::whereHas('position', function ($query) {
            $query->where('name', 'Researcher');
        })->get();

        return view('profile.profile_page', compact(
            'activities',
            'facilities',
            'members',
            'head',       // tambahkan
            'researchers' // tambahkan
        ));
    }
}
