<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $fillable = [
        'name', 'password', 'email', 'role', 'photo_url', 
        'sinta_link', 'position_id', 'created_at', 'updated_at'
    ];

    protected $hidden = ['password'];

    public $incrementing = false;
    protected $keyType = 'string';

    // Relationship ke Position - METHOD NAME: position()
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}