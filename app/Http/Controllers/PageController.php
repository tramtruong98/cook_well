<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('welcome', compact('categories', 'posts'));
    }

    public function selectCategory($id)
    {
        $posts = Post::where('cate_id', $id)->get();
        return view('pages.category', compact('posts'));
    }

}
