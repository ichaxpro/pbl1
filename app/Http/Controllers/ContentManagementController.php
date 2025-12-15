<?php

namespace App\Http\Controllers;

use App\DTO\ContentItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ContentManagementController extends Controller
{
    public function index(Request $request)
    {

        // dd($request->all());

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
                    'slug' => $item->slug,
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
if ($request->filled('type')) {
    $contentItems = $contentItems->whereIn('type', $request->type);
}

// ---------- FILTER BY STATUS ----------
if ($request->filled('status')) {
    $contentItems = $contentItems->whereIn('status', $request->status);
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
        $query = DB::table($table);

        // For news, use slug to avoid uuid cast issues
        if ($table === 'news') {
            $query->where('slug', $id);
        } else {
            $query->where('id', $id);
        }

        $query->update([
            'status' => DB::raw("'accepted'"),
            'approved_by' => auth()->id(),
        ]);

        return back()->with('success', 'Content approved');
    }

    // --------------------- Reject ---------------------
    public function reject(Request $request, $table, $id)
    {
        $query = DB::table($table);

        // For news, use slug to avoid uuid cast issues
        if ($table === 'news') {
            $query->where('slug', $id);
        } else {
            $query->where('id', $id);
        }

        $query->update([
            'status' => DB::raw("'rejected'"),
            'rejected_by' => auth()->id(),
            'note_admin' => $request->note_admin,
        ]);

        return back()->with('success', 'Content rejected');
    }

    // --------------------- Delete ---------------------
    public function destroy(Request $request, $table, $id)
    {
        $allowedTables = ['news', 'activities', 'facilities', 'publications'];

        if (!in_array($table, $allowedTables)) {
            abort(403);
        }

        $query = DB::table($table);

        // For news, delete by slug
        if ($table === 'news') {
            $query->where('slug', $id);
        } else {
            $query->where('id', $id);
        }

        // Only allow delete if accepted or rejected
        $content = $query->first();
        if (!$content || !in_array($content->status, ['accepted', 'rejected'])) {
            abort(403, 'Cannot delete requested content');
        }

        $query->delete();

        return back()->with('success', 'Content deleted successfully');
    }

    // --------------------- Preview Content (UPDATED) ---------------------
    public function preview(Request $request, $table, $id)
    {
        $allowedTables = ['news', 'activities', 'facilities', 'publications'];

        if (!in_array($table, $allowedTables)) {
            abort(404);
        }

        // Menentukan nama route publik yang benar dan parameter
        switch ($table) {
            case 'news':
                $routeName = 'news.show';
                // Get the slug from the news table
                $item = DB::table('news')->where('id', $id)->first();
                if (!$item)
                    abort(404);
                $routeParam = ['slug' => $item->slug];
                break;
            case 'activities':
                $routeName = 'activities.show';
                $routeParam = ['id' => $id];
                break;
            case 'facilities':
                $routeName = 'facilities.show';
                $routeParam = ['id' => $id];
                break;
            case 'publications':
                $routeName = 'publications.show1';
                $routeParam = ['id' => $id];
                break;
            default:
                abort(404);
        }

        // Stop early if the target route does not exist
        if (!Route::has($routeName)) {
            abort(404);
        }

        // 1. Generate URL ke halaman publik yang sebenarnya
        $publicUrl = route($routeName, $routeParam);

        // 2. Tambahkan parameter query 'preview=true' ke URL
        $previewUrl = $publicUrl . '?preview=true';

        // 3. Redirect admin ke URL dengan mode preview
        return redirect($previewUrl);
    }
}
