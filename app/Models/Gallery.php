<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'images'; 
    public $timestamps = false; 

    // Konfigurasi UUID untuk Primary Key
    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'string'; 

    protected $fillable = [
        'id',           // <-- TAMBAH BARIS INI KE FILLABLE
        'file_name',
        'url', 
        'uploaded_by', 
        'created_at',
    ];
}