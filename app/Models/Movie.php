<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {
    protected $fillable = ['title', 'year', 'director', 'genre', 'synopsis', 'image_url'];
}
