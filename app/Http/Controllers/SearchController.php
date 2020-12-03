<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function resultSearch(Request $request)
    {
        $posts = Post::search($request->search)->get();
        $number = $posts->count();
        return view('pages.search', compact('posts', 'number'));
    }
}
