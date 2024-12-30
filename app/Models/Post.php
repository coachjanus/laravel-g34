<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\PostStatus;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'user_id', 'status', 'cover'
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

}
