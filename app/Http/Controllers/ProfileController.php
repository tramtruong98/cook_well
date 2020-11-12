<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Recipe;
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
        $recipes = Recipe::where('author', Auth::user()->id)->get();
        return view('pages.my-blog', compact('recipes'));
    }
    // public function update(Request $request)
    // {
        
    // }

}
