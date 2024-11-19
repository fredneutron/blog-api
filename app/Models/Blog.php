<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    /**
     * Get the user that owns the blog.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the posts for the blog.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Scope a query to only include active blogs.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeActive($query)
    {
        $query->where('active', 1);
    }

    /**
     * Get the blog's latest post.
     */
    public function latestPost()
    {
        return $this->belongsTo(Post::class)->latestOfMany();
    }

    /**
     * Check if the blog has any posts.
     *
     * @return bool
     */
    public function hasPosts(): bool
    {
        return $this->posts()->exists();
    }

    /**
     * Get the number of posts for this blog.
     *
     * @return int
     */
    public function getPostCountAttribute(): int
    {
        return $this->posts()->count();
    }
}
