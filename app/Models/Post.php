<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Enums\PostStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = ['title', 'content', 'user_id', 'published_at', 'cover', 'status'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeStatus($query)
    {
        $query->where('status', PostStatus::ACTIVE());
    }

    public function scopePublished($query)
    {
        $query->where('updated_at', '<=', Carbon::now());
    }

    public function getThumbnailUrl()
    {
        $isUrl = str_contains($this->cover, 'http');
        return $isUrl ? $this->cover : asset(Storage::url($this->cover));
    }

    public function getReadingTime()
    {
        $mins = round(str_word_count($this->content) / 250);
        return ($mins < 1) ? 1 : $mins;
    }

}
