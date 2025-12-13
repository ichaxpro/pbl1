<?php
namespace App\Http\Controllers;
use App\Models\Facility; // atau model lain yang digunakan
use Illuminate\Http\Request;

class FacilityListController extends Controller{
    public function index() // atau method lain yang me-return view ini
    {
        // Bagian query database yang perlu diubah
        $facilities = Facility::where('status', 'accepted')->get();
        
        return view('profile.profile_page', compact('facilities'));
    }
}
?>
