<?php

namespace App\Models\Post;

use App\Models\User;
use App\Models\Post\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable  = ['name', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
