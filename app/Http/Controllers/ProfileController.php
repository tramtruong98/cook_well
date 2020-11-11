<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile');
    }
    public function myBlog()
    {
        //$posts = Post::where('author', Auth::user()->id);
        $posts = Post::all();
        return view('pages.my-blog', compact('posts'));
    }
}
