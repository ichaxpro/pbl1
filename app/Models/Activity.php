<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids; // PASTIKAN INI ADA

class Activity extends Model
{
    use HasUuids; // INI HARUS DI MODEL, BUKAN DI CONTROLLER

    protected $fillable = [
        'title',
        'image_url',
        'status',
        'created_by',
        'approved_by',
        'rejected_by',
        'note_admin',
        // HAPUS 'id', 'created_at', 'updated_at' dari fillable
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // TAMBAHKAN INI jika ingin UUID otomatis
    public $incrementing = false;
    protected $keyType = 'string';

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'created_by');
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'approved_by');
    }

    public function rejectedBy(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'rejected_by');
    }
}