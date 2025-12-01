<?php
// app/Http/Controllers/DatabaseTestController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
    public function test()
    {
        try {
            DB::connection()->getPdo();
            return response()->json([
                'status' => 'success',
                'database' => DB::getDatabaseName(),
                'message' => 'Database connected successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error', 
                'message' => $e->getMessage()
            ], 500);
        }
    }
}