<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'text',
        'author_id',
        'views',
        'publish_date',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    protected static function boot()
    {
        parent::boot();

        // Cascade delete comments when the post is deleted
        static::deleting(function ($post) {
            $post->comments()->delete();
        });
    }
}
