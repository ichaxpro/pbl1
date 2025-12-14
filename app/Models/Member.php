<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Member extends Authenticatable
{
    // WAJIB untuk UUID
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'password',
        'email',
        'role',
        'photo_url',
        'sinta_link',
        'position_id',
        'status'
    ];

    protected $hidden = ['password'];

    // AUTO GENERATE UUID
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    // Relationship ke Position
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
