<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
        $category = Category::where('id', $id)->first();
        $posts = Post::where('cate_id', $id)->get();
        return view('pages.category', compact('posts', 'category'));
    }
    public function selectTag($id)
    {
        $tag = Tag::where('id', $id)->first();
        //dd($tag);
        $posts = $tag->posts;
        return view('pages.tag', compact('tag', 'posts'));
    }

}
