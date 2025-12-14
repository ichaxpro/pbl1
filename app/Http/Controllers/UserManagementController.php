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
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:members,email',
        'role' => 'required|string|in:admin,operator',
        'position_id' => 'required|uuid',
        'photo' => 'nullable|image|max:2048',
    ]);

    // Upload photo
    $photoUrl = 'images/LabStructure/default.png';
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/LabStructure'), $filename);
        $photoUrl = 'images/LabStructure/' . $filename;
    }

    Member::create([
        'id' => Str::uuid(),
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt('default123'),
        'role' => $request->role,
        'position_id' => $request->position_id,
        'photo_url' => $photoUrl,
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
