<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Post $tweet)
    {
        $tweet->like(auth()->user());

        return back();
    }

    public function destroy(Post $tweet)
    {
        $tweet->dislike(auth()->user());

        return back();
    }
}
