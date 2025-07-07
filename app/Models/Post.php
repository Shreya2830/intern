<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'slug',
        'content',
        'category_id',
        'user_id',
        'published_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   public function readTime($wordsPerMinute = 100){
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / $wordsPerMinute); // Assuming average reading speed of 200 words per minute
        return max(1,$minutes) ;
   }

   public function imageUrl(): string
    {
        if ($this->image) {
            return \Illuminate\Support\Facades\Storage::url($this->image);
        }

        return null;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
