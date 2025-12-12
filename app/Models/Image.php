<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'file_name',
        'url',
        'uploaded_by',
        'created_at'
    ];

    public $timestamps = false;
}
