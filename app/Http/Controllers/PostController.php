<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;


class PostController extends Controller
{
    public function index()
    {
            return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
                )->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function votedUsers(){ //or simply likes
        return $this->belongsToMany(User::class, 'likes')->withPivot('is_dislike')->withTimestamps();
    }
}
