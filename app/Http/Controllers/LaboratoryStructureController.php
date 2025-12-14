<?php

namespace App\Http\Controllers;

use App\Models\Member;
class LaboratoryStructureController extends Controller
{
    public function index()
    {
        // Cari Head Lab - pakai 'position' (sesuai relationship method di Model Member)
        $head = Member::where('status', 'active')
            ->whereHas('position', function ($query) {
                $query->where('name', 'Head Lab');
            })->first();

        // Cari Researchers
        $researchers = Member::where('status', 'active')
            ->whereHas('position', function ($query) {
                $query->where('name', 'Researcher');
            })->get();

        // Debug: Jika masih tidak ada head
        if (!$head) {
            // Coba cara lain - cari berdasarkan role admin
            $head = Member::where('role', 'admin')
                ->where('status', 'active')
                ->first();

            // Jika masih tidak ada, ambil member pertama sebagai fallback
            if (!$head) {
                $head = Member::where('status', 'active')->first();
            }

        }

        // Debug info (hapus di production)
        // dd($head, $researchers);

        return view('profile/laboratory_structure', compact('head', 'researchers'));
    }
}