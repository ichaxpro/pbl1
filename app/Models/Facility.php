<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids; // PASTIKAN INI ADA


class Facility extends Model
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

    //   protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($facility) {
    //         $authorName = $facility->createdBy ? $facility->createdBy->name : 'Someone';
    //         $message = "{$authorName} added new facility$facility: {$facility->title}";
    //         $facility->addNotification($message, 'info');
    //     });

    //     static::updated(function ($facility) {
    //         if ($facility->isDirty('status')) {
    //             $oldStatus = $facility->getOriginal('status');
    //             $newStatus = $facility->status;
                
    //             if ($newStatus === 'accepted') {
    //                 $message = "facility$facility '{$facility->title}' has been approved";
    //                 $facility->addNotification($message, 'success');
    //             } elseif ($newStatus === 'rejected') {
    //                 $message = "facility$facility '{$facility->title}' has been rejected";
    //                 $facility->addNotification($message, 'warning');
    //             }
    //         }
    //     });
    // }

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