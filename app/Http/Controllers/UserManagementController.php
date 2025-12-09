<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $members = Member::when($search, function ($query) use ($search) {
            $query->where('name', 'ILIKE', "%$search%")
                  ->orWhere('email', 'ILIKE', "%$search%")
                  ->orWhere('role', 'ILIKE', "%$search%");
        })->paginate(10);

        return view('admin.user_management', compact('members', 'search'));
    }

    public function store(Request $request)
    {
        Member::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('default123'),  // or ask for input
            'role' => $request->role,
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Member added.');
    }

    public function update(Request $request, $id)
    {
        Member::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Member updated.');
    }

    public function delete($id)
    {
        Member::where('id', $id)->delete();

        return back()->with('success', 'Member deleted.');
    }
}
