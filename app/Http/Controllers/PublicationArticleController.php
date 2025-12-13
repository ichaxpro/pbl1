<?php
namespace App\Http\Controllers;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicationArticleController extends Controller
{
    public function show($id)
    {
        $publication = Publication::where('id', $id)->where('status', 'accepted')->firstOrFail();
        
        return view('publications.page_publication_article', compact('publication'));
    }
    public function show1(Request $request, $id)
    {
        $query = DB::table('publications')->where('id', $id);
        
        // Tentukan apakah ini mode preview admin
        $isPreview = $request->has('preview') && auth()->check();

        if (!$isPreview) {
            // Jika BUKAN mode preview, hanya tampilkan yang statusnya approved/accepted
            // Ganti 'approved' dengan nilai ENUM yang benar jika Anda menggunakan 'accepted'
            $query->where('status', 'accepted'); 
        }

        $publicationItem = $query->first();

        // Jika konten tidak ditemukan ATAU tidak disetujui (dan bukan mode preview), kembalikan 404
        if (!$publicationItem) {
            abort(404);
        }
        
        // Kirim item ke view
        return view('publications.page_publication_article', ['publication' => $publicationItem]);
    }
}

?>
