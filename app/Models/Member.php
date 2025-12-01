<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name', 'password', 'email', 'role', 'photo_url', 
        'sinta_link', 'position_id', 'created_at', 'updated_at'
    ];

    protected $hidden = ['password'];

    // Relationship ke Position - METHOD NAME: position()
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}