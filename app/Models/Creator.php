<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    protected $fillable = ['title','content','author', 'place_id'];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    /** @use HasFactory<\Database\Factories\CreatorFactory> */
    use HasFactory;
}
