<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Publication;
use App\Models\Member;
use App\Models\Facility;
use App\Models\Activity;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class OperatorDashboardController extends Controller
{
    public function index()
    {
        $currentUserId = Auth::id();

        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        // Total counts
        $totalNews = News::where('author_id', $currentUserId)->where('status', 'accepted')
            ->count();
        $totalPublications = Publication::where('created_by', $currentUserId)
            ->where('status', 'accepted')
            ->count();
        $totalMembers = Member::count();
        $totalFacilities = Facility::where('created_by', $currentUserId)->where('status', 'accepted')
            ->count();
        $totalActivities = Activity::where('created_by', $currentUserId)->where('status', 'accepted')
            ->count();


        // Counts for today
        $todayNews = News::whereDate('created_at', $today)->where('author_id', $currentUserId)->count();
        $todayPublications = Publication::whereDate('created_at', $today)
            ->where('created_by', $currentUserId)
            ->where('status', 'accepted')
            ->count();
        $todayMembers = Member::whereDate('created_at', $today)->count();

        // Counts for yesterday
        $yesterdayNews = News::whereDate('created_at', $yesterday)->where('author_id', $currentUserId)->count();
        $yesterdayPublications = Publication::whereDate('created_at', $yesterday)
            ->where('created_by', $currentUserId)
            ->where('status', 'accepted')
            ->count();
        $yesterdayMembers = Member::whereDate('created_at', $yesterday)->count();

        // Differences
        $newsDiff = $todayNews - $yesterdayNews;
        $publicationsDiff = $todayPublications - $yesterdayPublications;
        $membersDiff = $todayMembers - $yesterdayMembers;

        // Approval status
        $requestedCount = News::where('status', 'requested')->where('author_id', $currentUserId)->count()
            + Publication::where('status', 'requested')->where('created_by', $currentUserId)->count()
            + Facility::where('status', 'requested')->where('created_by', $currentUserId)->count()
            + Activity::where('status', 'requested')->where('created_by', $currentUserId)->count();

        $approvedCount = News::where('status', 'accepted')->where('author_id', $currentUserId)->count()
            + Publication::where('status', 'accepted')->where('created_by', $currentUserId)->count()
            + Facility::where('status', 'accepted')->where('created_by', $currentUserId)->count()
            + Activity::where('status', 'accepted')->where('created_by', $currentUserId)->count();

        $rejectedCount = News::where('status', 'rejected')->where('author_id', $currentUserId)->count()
            + Publication::where('status', 'rejected')->where('created_by', $currentUserId)->count()
            + Facility::where('status', 'rejected')->where('created_by', $currentUserId)->count()
            + Activity::where('status', 'rejected')->where('created_by', $currentUserId)->count();

        // Daily breakdown
        $todayRequested = News::whereDate('created_at', $today)->where('status', 'requested')->where('author_id', $currentUserId)->count()
            + Publication::whereDate('created_at', $today)->where('status', 'requested')->where('created_by', $currentUserId)->count()
            + Facility::whereDate('created_at', $today)->where('status', 'requested')->where('created_by', $currentUserId)->count()
            + Activity::whereDate('created_at', $today)->where('status', 'requested')->where('created_by', $currentUserId)->count();

        $todayApproved = News::whereDate('created_at', $today)->where('status', 'accepted')->where('author_id', $currentUserId)->count()
            + Publication::whereDate('created_at', $today)->where('status', 'accepted')->where('created_by', $currentUserId)->count()
            + Facility::whereDate('created_at', $today)->where('status', 'accepted')->where('created_by', $currentUserId)->count()
            + Activity::whereDate('created_at', $today)->where('status', 'accepted')->where('created_by', $currentUserId)->count();

        $todayRejected = News::whereDate('created_at', $today)->where('status', 'rejected')->where('author_id', $currentUserId)->count()
            + Publication::whereDate('created_at', $today)->where('status', 'rejected')->where('created_by', $currentUserId)->count()
            + Facility::whereDate('created_at', $today)->where('status', 'rejected')->where('created_by', $currentUserId)->count()
            + Activity::whereDate('created_at', $today)->where('status', 'rejected')->where('created_by', $currentUserId)->count();

        $yesterdayRequested = News::whereDate('created_at', $yesterday)->where('status', 'requested')->where('author_id', $currentUserId)->count()
            + Publication::whereDate('created_at', $yesterday)->where('status', 'requested')->where('created_by', $currentUserId)->count()
            + Facility::whereDate('created_at', $yesterday)->where('status', 'requested')->where('created_by', $currentUserId)->count()
            + Activity::whereDate('created_at', $yesterday)->where('status', 'requested')->where('created_by', $currentUserId)->count();

        $yesterdayApproved = News::whereDate('created_at', $yesterday)->where('status', 'accepted')->where('author_id', $currentUserId)->count()
            + Publication::whereDate('created_at', $yesterday)->where('status', 'accepted')->where('created_by', $currentUserId)->count()
            + Facility::whereDate('created_at', $yesterday)->where('status', 'accepted')->where('created_by', $currentUserId)->count()
            + Activity::whereDate('created_at', $yesterday)->where('status', 'accepted')->where('created_by', $currentUserId)->count();

        $yesterdayRejected = News::whereDate('created_at', $yesterday)->where('status', 'rejected')->where('author_id', $currentUserId)->count()
            + Publication::whereDate('created_at', $yesterday)->where('status', 'rejected')->where('created_by', $currentUserId)->count()
            + Facility::whereDate('created_at', $yesterday)->where('status', 'rejected')->where('created_by', $currentUserId)->count()
            + Activity::whereDate('created_at', $yesterday)->where('status', 'rejected')->where('created_by', $currentUserId)->count();

        $requestedDiff = $todayRequested - $yesterdayRequested;
        $approvedDiff = $todayApproved - $yesterdayApproved;
        $rejectedDiff = $todayRejected - $yesterdayRejected;

        // Monthly stats
        $currentMonth = now()->month;
        $currentYear = now()->year;

        $monthlyNews = News::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('author_id', $currentUserId)
            ->where('status', 'accepted')
            ->count();
        $monthlyPublications = Publication::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('created_by', $currentUserId)
            ->where('status', 'accepted')
            ->count();
        $monthlyMembers = Member::whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear)->count();
        $monthlyActivities = Activity::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('created_by', $currentUserId)
            ->where('status', 'accepted')
            ->count();
        $monthlyFacilities = Facility::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('created_by', $currentUserId)
            ->where('status', 'accepted')
            ->count();

        return view('operator.dashboard-operator', compact(
            'totalNews',
            'totalPublications',
            'totalMembers',
            'totalFacilities',
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
            'monthlyActivities',
            'monthlyFacilities'
        ));
    }

}