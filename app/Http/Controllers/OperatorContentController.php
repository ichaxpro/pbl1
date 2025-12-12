<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class OperatorContentController extends Controller
{
    public function index(Request $request)
    {
        $operatorId = auth()->id();
        $items = collect();

        // ------------------ NEWS ------------------
        $news = DB::table('news')
            ->where('author_id', $operatorId)
            ->select('id', 'title', 'created_at', 'status')
            ->get();

        foreach ($news as $n) {
            $items->push((object)[
                'id'         => $n->id,
                'title'      => $n->title,
                'type'       => 'news',
                'created_at' => $n->created_at,
                'status'     => $n->status,
                'table'      => 'news'
            ]);
        }

        // ------------------ ACTIVITIES ------------------
        $activities = DB::table('activities')
            ->where('created_by', $operatorId)
            ->select('id', 'title', 'created_at', 'status')
            ->get();

        foreach ($activities as $a) {
            $items->push((object)[
                'id'         => $a->id,
                'title'      => $a->title,
                'type'       => 'activities',
                'created_at' => $a->created_at,
                'status'     => $a->status,
                'table'      => 'activities'
            ]);
        }

        // ------------------ FACILITIES ------------------
        $facilities = DB::table('facilities')
            ->where('created_by', $operatorId)
            ->select('id', 'title', 'created_at', 'status')
            ->get();

        foreach ($facilities as $f) {
            $items->push((object)[
                'id'         => $f->id,
                'title'      => $f->title,
                'type'       => 'facilities',
                'created_at' => $f->created_at,
                'status'     => $f->status,
                'table'      => 'facilities'
            ]);
        }

        // ------------------ PUBLICATIONS ------------------
        $publications = DB::table('publications')
            ->where('created_by', $operatorId)
            ->select('id', 'title', 'created_at', 'status')
            ->get();

        foreach ($publications as $p) {
            $items->push((object)[
                'id'         => $p->id,
                'title'      => $p->title,
                'type'       => 'publications',
                'created_at' => $p->created_at,
                'status'     => $p->status,
                'table'      => 'publications'
            ]);
        }

        // ------------------ SEARCH ------------------
        if ($search = $request->search) {
            $items = $items->filter(fn ($i) =>
                str_contains(strtolower($i->title), strtolower($search))
            );
        }

        // ------------------ FILTER BY TYPE ------------------
        if ($type = $request->type) {
            $items = $items->where('type', $type);
        }

        // ------------------ FILTER BY STATUS ------------------
        if ($status = $request->status) {
            $items = $items->where('status', $status);
        }

        // ------------------ SORT NEWEST FIRST ------------------
        $items = $items->sortByDesc('created_at')->values();

        // ------------------ PAGINATION ------------------
        $page = $request->get('page', 1);
        $perPage = 10;

        $paginated = new LengthAwarePaginator(
            $items->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page,
            ['path' => url()->current()]
        );

        return view('operator.content_management', [
            'content' => $paginated
        ]);
    }

    // ------------------ DELETE (operator) ------------------
    public function delete($table, $id)
    {
        DB::table($table)->where('id', $id)->delete();

        return back()->with('success', 'Content deleted successfully.');
    }
}
