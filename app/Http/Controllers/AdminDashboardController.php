<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Publication;
use App\Models\Member;
use App\Models\Facility;
use App\Models\Activity;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        // Total counts
        $totalNews = News::count();
        $totalPublications = Publication::count();
        $totalMembers = Member::count();
        
        // Counts for today
        $todayNews = News::whereDate('created_at', $today)->count();
        $todayPublications = Publication::whereDate('created_at', $today)->count();
        $todayMembers = Member::whereDate('created_at', $today)->count();
        
        // Counts for yesterday
        $yesterdayNews = News::whereDate('created_at', $yesterday)->count();
        $yesterdayPublications = Publication::whereDate('created_at', $yesterday)->count();
        $yesterdayMembers = Member::whereDate('created_at', $yesterday)->count();
        
        // Differences
        $newsDiff = $todayNews - $yesterdayNews;
        $publicationsDiff = $todayPublications - $yesterdayPublications;
        $membersDiff = $todayMembers - $yesterdayMembers;

        // Approval status
        $requestedCount = News::where('status', 'requested')->count()
                        + Publication::where('status', 'requested')->count()
                        + Facility::where('status', 'requested')->count()
                        + Activity::where('status', 'requested')->count();

        $approvedCount = News::where('status', 'accepted')->count()
                        + Publication::where('status', 'accepted')->count()
                        + Facility::where('status', 'accepted')->count()
                        + Activity::where('status', 'accepted')->count();

        $rejectedCount = News::where('status', 'rejected')->count()
                        + Publication::where('status', 'rejected')->count()
                        + Facility::where('status', 'rejected')->count()
                        + Activity::where('status', 'rejected')->count();

        // Daily breakdown
        $todayRequested = News::whereDate('created_at', $today)->where('status', 'requested')->count()
                        + Publication::whereDate('created_at', $today)->where('status', 'requested')->count()
                        + Facility::whereDate('created_at', $today)->where('status', 'requested')->count()
                        + Activity::whereDate('created_at', $today)->where('status', 'requested')->count();

        $todayApproved = News::whereDate('created_at', $today)->where('status', 'accepted')->count()
                        + Publication::whereDate('created_at', $today)->where('status', 'accepted')->count()
                        + Facility::whereDate('created_at', $today)->where('status', 'accepted')->count()
                        + Activity::whereDate('created_at', $today)->where('status', 'accepted')->count();

        $todayRejected = News::whereDate('created_at', $today)->where('status', 'rejected')->count()
                        + Publication::whereDate('created_at', $today)->where('status', 'rejected')->count()
                        + Facility::whereDate('created_at', $today)->where('status', 'rejected')->count()
                        + Activity::whereDate('created_at', $today)->where('status', 'rejected')->count();

        $yesterdayRequested = News::whereDate('created_at', $yesterday)->where('status', 'requested')->count()
                        + Publication::whereDate('created_at', $yesterday)->where('status', 'requested')->count()
                        + Facility::whereDate('created_at', $yesterday)->where('status', 'requested')->count()
                        + Activity::whereDate('created_at', $yesterday)->where('status', 'requested')->count();

        $yesterdayApproved = News::whereDate('created_at', $yesterday)->where('status', 'accepted')->count()
                        + Publication::whereDate('created_at', $yesterday)->where('status', 'accepted')->count()
                        + Facility::whereDate('created_at', $yesterday)->where('status', 'accepted')->count()
                        + Activity::whereDate('created_at', $yesterday)->where('status', 'accepted')->count();

        $yesterdayRejected = News::whereDate('created_at', $yesterday)->where('status', 'rejected')->count()
                        + Publication::whereDate('created_at', $yesterday)->where('status', 'rejected')->count()
                        + Facility::whereDate('created_at', $yesterday)->where('status', 'rejected')->count()
                        + Activity::whereDate('created_at', $yesterday)->where('status', 'rejected')->count();

        $requestedDiff = $todayRequested - $yesterdayRequested;
        $approvedDiff = $todayApproved - $yesterdayApproved;
        $rejectedDiff = $todayRejected - $yesterdayRejected;

        // Monthly stats
        $currentMonth = now()->month;
        $currentYear = now()->year;

        $monthlyNews = News::whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear)->count();
        $monthlyPublications = Publication::whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear)->count();
        $monthlyMembers = Member::whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear)->count();
        $monthlyActivities = Activity::whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear)->count();

        return view('admin.dashboard', compact(
            'totalNews',
            'totalPublications', 
            'totalMembers',
            'newsDiff',
            'publicationsDiff', 
            'membersDiff',
            'requestedCount',
            'approvedCount',
            'rejectedCount',
            'todayRequested',
            'todayApproved',
            'todayRejected',
            'yesterdayRequested',
            'yesterdayApproved',
            'yesterdayRejected',
            'requestedDiff',
            'approvedDiff',
            'rejectedDiff',
            'monthlyNews',
            'monthlyPublications',
            'monthlyMembers',
            'monthlyActivities'
        ));
    }
}
