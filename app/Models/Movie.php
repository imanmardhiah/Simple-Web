<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'genre',
        'production',
        'releaseyear',
        'main_picture',
    ];
    public function rating()
    {
        return $this->hasMany('App\Models\Rating');
    }
    public function cast(){

        return $this->hasMany('App\Models\Cast');

    }
}
