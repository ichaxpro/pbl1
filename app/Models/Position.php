<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['name'];
    
    // Optional: Relationship back to members
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}