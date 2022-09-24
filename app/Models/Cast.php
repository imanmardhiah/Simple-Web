<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;
    
    protected $fillable = ['movie_id', 'name', 'profile_picture'];

    public function movie() {
        return $this->belongsTo(Movie::class);
    }
}
