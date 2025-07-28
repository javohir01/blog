<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'slug', 'body', 'image', 'like', 'views'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeLifo($query)
    {
        return $query->orderBy('created_at', 'desc');
        // return $query->orderByDesc('created_at');
    }

    public function getShortBodyAttribute()
    {
        return mb_substr(strip_tags($this->body), 0, 100) . '...';
    }
}