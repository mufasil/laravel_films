<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'release_date', 'rating', 'ticket_price', 'country_code', 'photo', 'user_id'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, "film_genres");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
