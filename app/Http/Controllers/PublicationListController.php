<?php
// Contoh struktur file Controller yang saya butuhkan
namespace App\Http\Controllers;
use App\Models\Publication; // atau model lain yang digunakan
use Illuminate\Http\Request;

class PublicationListController extends Controller
{
    public function index() // atau method lain yang me-return view ini
    {
        // Bagian query database yang perlu diubah
        $publications = Publication::where('status', 'accepted')->get();
        
        return view('publications.page_publication', compact('publications'));
    }
}
?>