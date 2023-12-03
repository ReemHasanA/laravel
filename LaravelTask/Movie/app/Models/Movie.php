<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['movie_name','movie_description','movie_gener'];
    //,'movie_img'

    public function actor(){
        return $this->belongsToMany(Actor::class);
    }
}
