<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Publication;
use App\Models\Member;
use App\Models\Facility;
use App\Models\Activity;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
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
        
        // Calculate differences
        $newsDiff = $todayNews - $yesterdayNews;
        $publicationsDiff = $todayPublications - $yesterdayPublications;
        $membersDiff = $todayMembers - $yesterdayMembers;

        // Approval status counts
        $requestedNews = News::where('status', 'requested')->count();
        $requestedPublications = Publication::where('status', 'requested')->count();
        $requestedFacilities = Facility::where('status', 'requested')->count();
        $requestedActivities = Activity::where('status', 'requested')->count();
        
        $requestedCount = $requestedNews + $requestedPublications + $requestedFacilities + $requestedActivities;

        $approvedNews = News::where('status', 'accepted')->count();
        $approvedPublications = Publication::where('status', 'accepted')->count();
        $approvedFacilities = Facility::where('status', 'accepted')->count();
        $approvedActivities = Activity::where('status', 'accepted')->count();
        
        $approvedCount = $approvedNews + $approvedPublications + $approvedFacilities + $approvedActivities;

        $rejectedNews = News::where('status', 'rejected')->count();
        $rejectedPublications = Publication::where('status', 'rejected')->count();
        $rejectedFacilities = Facility::where('status', 'rejected')->count();
        $rejectedActivities = Activity::where('status', 'rejected')->count();
        
        $rejectedCount = $rejectedNews + $rejectedPublications + $rejectedFacilities + $rejectedActivities;

        // Counts for approval statuses today (by created_at date)
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

        // Counts for yesterday approval statuses (by created_at date)
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

        // calculate the difference of approval statuses between today and yesterday
        $requestedDiff = $todayRequested - $yesterdayRequested;
        $approvedDiff = $todayApproved - $yesterdayApproved;
        $rejectedDiff = $todayRejected - $yesterdayRejected;
        
        // Monthly statistics (current month)
        $currentMonth = now()->month;
        $currentYear = now()->year;
        
        $monthlyNews = News::whereMonth('created_at', $currentMonth)
                          ->whereYear('created_at', $currentYear)
                          ->count();
                          
        $monthlyPublications = Publication::whereMonth('created_at', $currentMonth)
                                        ->whereYear('created_at', $currentYear)
                                        ->count();
                                        
        $monthlyMembers = Member::whereMonth('created_at', $currentMonth)
                               ->whereYear('created_at', $currentYear)
                               ->count();
                               
        $monthlyActivities = Activity::whereMonth('created_at', $currentMonth)
                                   ->whereYear('created_at', $currentYear)
                                   ->count();
        
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
