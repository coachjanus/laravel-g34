<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\PostStatus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'user_id', 'status', 'cover', 'published'
    ];

    protected function casts()
    {
        return [
            'status' => PostStatus::class,
        ];
    }


    public function scopeSearch($query, $value) {
        $query->where('title', 'like', "%{$value}%")
        ->orWhere('content', 'like', "%{$value}%");
    }

    public function scopePublished($query) {
        $query->where('published', '=', true);
    }

    public function scopeWithTag($query, $tag) {
        $query->whereHas('tags', function($query) use ($tag) {
            $query->where('slug', $tag);
        });
    }

    public function scopePopular($query) {
        $query->withCount('like')->orderBy('likes_count', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function commemts() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }

   
    public function getExcerpt() {
        return Str::limit(strip_tags($this->content), 150);
    }
    public function getReadingTime() {

        $mins = round(str_word_count($this->content)/250);
        return ($mins < 1) ? 1 : $mins;

    }
    public function getThumbnailUrl() {
        $isUrl = str_contains($this->cover, 'http');
        return ($isUrl) ? $this->cover : asset(Storage::url($this->cover));
    }


}
