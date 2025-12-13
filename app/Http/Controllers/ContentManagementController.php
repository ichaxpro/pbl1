<?php

namespace App\Http\Controllers;

use App\DTO\ContentItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentManagementController extends Controller
{
    public function index(Request $request)
    {
        $contentItems = collect();

        // ---------- NEWS ----------
        $news = DB::table('news')
            ->leftJoin('members', 'members.id', '=', 'news.author_id')
            ->select('news.*', 'members.name as operator_name')
            ->get();

        foreach ($news as $item) {
            $contentItems->push(
                new ContentItem([
                    'id' => $item->id,
                    'title' => $item->title,
                    'type' => 'news',
                    'date' => $item->created_at,
                    'operator_name' => $item->operator_name ?? 'Unknown',
                    'status' => $item->status,
                    'note_admin' => $item->note_admin,
                    'table' => 'news'
                ])
            );
        }

        // ---------- ACTIVITIES ----------
        $activities = DB::table('activities')
            ->leftJoin('members', 'members.id', '=', 'activities.created_by')
            ->select('activities.*', 'members.name as operator_name')
            ->get();

        foreach ($activities as $item) {
            $contentItems->push(
                new ContentItem([
                    'id' => $item->id,
                    'title' => $item->title,
                    'type' => 'activities',
                    'date' => $item->created_at,
                    'operator_name' => $item->operator_name ?? 'Unknown',
                    'status' => $item->status,
                    'note_admin' => $item->note_admin,
                    'table' => 'activities'
                ])
            );
        }

        // ---------- FACILITIES ----------
        $facilities = DB::table('facilities')
            ->leftJoin('members', 'members.id', '=', 'facilities.created_by')
            ->select('facilities.*', 'members.name as operator_name')
            ->get();

        foreach ($facilities as $item) {
            $contentItems->push(
                new ContentItem([
                    'id' => $item->id,
                    'title' => $item->title,
                    'type' => 'facilities',
                    'date' => $item->created_at,
                    'operator_name' => $item->operator_name ?? 'Unknown',
                    'status' => $item->status,
                    'note_admin' => $item->note_admin,
                    'table' => 'facilities'
                ])
            );
        }

        // ---------- PUBLICATIONS ----------
        $publications = DB::table('publications')
            ->leftJoin('members', 'members.id', '=', 'publications.created_by')
            ->select('publications.*', 'members.name as operator_name')
            ->get();

        foreach ($publications as $item) {
            $contentItems->push(
                new ContentItem([
                    'id' => $item->id,
                    'title' => $item->title,
                    'type' => 'publications',
                    'date' => $item->created_at,
                    'operator_name' => $item->operator_name ?? 'Unknown',
                    'status' => $item->status,
                    'note_admin' => $item->note_admin,
                    'table' => 'publications'
                ])
            );
        }

        // ---------- SEARCH ----------
        if ($request->search) {
            $contentItems = $contentItems->filter(function ($item) use ($request) {
                return str_contains(strtolower($item->title), strtolower($request->search));
            });
        }

        // ---------- FILTER BY TYPE ----------
        if ($request->type) {
            $contentItems = $contentItems->where('type', $request->type);
        }

        // ---------- FILTER BY STATUS ----------
        if ($request->status) {
            $contentItems = $contentItems->where('status', $request->status);
        }

        // ---------- SORT ----------
        $contentItems = $contentItems->sortByDesc('date')->values();

        // ---------- PAGINATION ----------
        $page = $request->get('page', 1);
        $perPage = 10;
        $paginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $contentItems->forPage($page, $perPage),
            $contentItems->count(),
            $perPage,
            $page,
            ['path' => url()->current()]
        );

        return view('admin.management-content', ['contents' => $paginated]);
    }


    // --------------------- Approve ---------------------
    public function approve(Request $request, $table, $id)
    {
        DB::table($table)->where('id', $id)->update([
            'status' => DB::raw("'accepted'"),
            'approved_by' => auth()->id(),
        ]);

        return back()->with('success', 'Content approved');
    }

    // --------------------- Reject ---------------------
    public function reject(Request $request, $table, $id)
    {
        DB::table($table)->where('id', $id)->update([
            'status' => DB::raw("'rejected'"),
            'rejected_by' => auth()->id(),
            'note_admin' => $request->note_admin,
        ]);

        return back()->with('success', 'Content rejected');
    }
}
