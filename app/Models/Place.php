<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{

    
    protected $fillable = ['name', 'location', 'description'];

    public function creators()
    {
        return $this->hasMany(Creator::class);
    }
    /** @use HasFactory<\Database\Factories\PlaceFactory> */
    use HasFactory;
}
