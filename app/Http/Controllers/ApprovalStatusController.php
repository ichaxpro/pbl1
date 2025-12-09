<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use App\Models\Facility;
use App\Models\News;
use App\Models\Publication;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ApprovalStatusController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $search = request('search');

        // Get records created by this operator
        $activities = Activity::where('created_by', $userId)
            ->select('id', 'title', 'status', 'note_admin', 'created_at')
            ->get()
            ->map(fn($item) => [
                'title' => $item->title,
                'type' => 'Activity',
                'upload_date' => $item->created_at,
                'note_admin' => $item->note_admin,
                'status' => $item->status
            ]);

        $facilities = Facility::where('created_by', $userId)
            ->select('id', 'title', 'status', 'note_admin', 'created_at')
            ->get()
            ->map(fn($item) => [
                'title' => $item->title,
                'type' => 'Facility',
                'upload_date' => $item->created_at,
                'note_admin' => $item->note_admin,
                'status' => $item->status
            ]);

        $news = News::where('author_id', $userId)
            ->select('id', 'title', 'status', 'note_admin', 'created_at')
            ->get()
            ->map(fn($item) => [
                'title' => $item->title,
                'type' => 'News',
                'upload_date' => $item->created_at,
                'note_admin' => $item->note_admin,
                'status' => $item->status
            ]);

        $publications = Publication::where('created_by', $userId)
            ->select('id', 'title', 'status', 'note_admin', 'created_at')
            ->get()
            ->map(fn($item) => [
                'title' => $item->title,
                'type' => 'Publication',
                'upload_date' => $item->created_at,
                'note_admin' => $item->note_admin,
                'status' => $item->status
            ]);

        // Merge into a single collection
        $merged = collect()
            ->merge($activities)
            ->merge($facilities)
            ->merge($news)
            ->merge($publications)
            ->sortByDesc('upload_date');

        // SEARCH FILTER
        if ($search) {
            $merged = $merged->filter(function ($item) use ($search) {
                return str_contains(strtolower($item['title']), strtolower($search))
                    || str_contains(strtolower($item['type']), strtolower($search))
                    || str_contains(strtolower($item['status']), strtolower($search));
            });
        }

        // --- PAGINATION HANDLING ---
        $perPage = 10;
        $page = request()->get('page', 1);

        $paginated = new LengthAwarePaginator(
            $merged->slice(($page - 1) * $perPage, $perPage)->values(),
            $merged->count(),
            $perPage,
            $page,
            ['path' => request()->url()]
        );

        // Count totals
        $stats = [
            'requested' => $merged->where('status', 'requested')->count(),
            'approved' => $merged->where('status', 'approved')->count(),
            'declined' => $merged->where('status', 'rejected')->count()
        ];

        // return view('operator.approval_status', compact('paginated', 'stats'));
                // return view('operator.approval_status', compact('paginated', 'stats', 'search'));
        return view('operator.approval_status', compact('paginated', 'stats', 'search'));

    }
}
