<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['title', 'category_id', 'author_id'];
    public function category()
    {
        return $this->belongsTo(CategoryBooks::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'books_id');
    }
    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }
}
