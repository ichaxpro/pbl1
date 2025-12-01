<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    protected $table = 'news'; // Specify table name

    protected $fillable = [
        'id',
        'title',
        'slug',
        'content',
        'thumbnail_url',
        'status',
        'author_id',
        'approved_by',
        'rejected_by',
        'published_at',
        'note_admin',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($news) {
    //         $authorName = $news->author ? $news->author->name : 'Someone';
    //         $message = "{$authorName} created new news: {$news->title}";
    //         $news->addNotification($message, 'info');
    //     });

    //     static::updated(function ($news) {
    //         if ($news->isDirty('status')) {
    //             $oldStatus = $news->getOriginal('status');
    //             $newStatus = $news->status;
                
    //             if ($newStatus === 'accepted') {
    //                 $message = "News '{$news->title}' has been approved";
    //                 $news->addNotification($message, 'success');
    //             } elseif ($newStatus === 'rejected') {
    //                 $message = "News '{$news->title}' has been rejected";
    //                 $news->addNotification($message, 'warning');
    //             }
    //         }
    //     });
    // }

    // Relationship dengan author (member yang membuat news)
    public function author(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'author_id');
    }

    // Relationship dengan admin yang approve
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'approved_by');
    }

    // Relationship dengan admin yang reject
    public function rejectedBy(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'rejected_by');
    }

    // Scope untuk status tertentu (optional)
    public function scopeRequested($query)
    {
        return $query->where('status', 'requested');
    }

    public function scopeAccepted($query)
    {
        return $query->where('status', 'accepted');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    // Scope untuk published news (optional)
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')
                    ->where('status', 'accepted');
    }
}