<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Publication extends Model
{
    protected $fillable = [
        'id',
        'title',
        'date',
        'abstract',
        'file_url',
        'status',
        'created_by',
        'rejected_by',
        'approved_by',
        'note_admin',
        'created_at'
    ];

    //   protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($publication) {
    //         $authorName = $publication->createdBy ? $publication->createdBy->name : 'Someone';
    //         $message = "{$authorName} added new publication: {$publication->title}";
    //         $publication->addNotification($message, 'info');
    //     });

    //     static::updated(function ($publication) {
    //         if ($publication->isDirty('status')) {
    //             $oldStatus = $publication->getOriginal('status');
    //             $newStatus = $publication->status;
                
    //             if ($newStatus === 'accepted') {
    //                 $message = "Publication '{$publication->title}' has been approved";
    //                 $publication->addNotification($message, 'success');
    //             } elseif ($newStatus === 'rejected') {
    //                 $message = "Publication '{$publication->title}' has been rejected";
    //                 $publication->addNotification($message, 'warning');
    //             }
    //         }
    //     });
    // }

    protected $casts = [
        'date' => 'date',
        'created_at' => 'datetime'
    ];

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