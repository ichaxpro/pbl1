<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    protected $fillable = [
        'id',
        'title',
        'description',
        'image_url',
        'status',
        'created_by',
        'approved_by',
        'rejected_by',
        'note_admin',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    //   protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($activity) {
    //         $authorName = $activity->createdBy ? $activity->createdBy->name : 'Someone';
    //         $message = "{$authorName} added new ac$activity: {$activity->title}";
    //         $activity->addNotification($message, 'info');
    //     });

    //     static::updated(function ($activity) {
    //         if ($activity->isDirty('status')) {
    //             $oldStatus = $activity->getOriginal('status');
    //             $newStatus = $activity->status;
                
    //             if ($newStatus === 'accepted') {
    //                 $message = "activity$activity '{$activity->title}' has been approved";
    //                 $activity->addNotification($message, 'success');
    //             } elseif ($newStatus === 'rejected') {
    //                 $message = "activity$activity '{$activity->title}' has been rejected";
    //                 $activity->addNotification($message, 'warning');
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