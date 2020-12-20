<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Post;
use App\Models\Recipe;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->simplePaginate(20);
        return view('admin.users.index', compact('users'));
    }
    public function showRecipes()
    {
        $recipes = Recipe::with('course')->simplePaginate(20);
        return view('admin.pages.recipe', compact('recipes'));
    }
    public function showPosts()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::with('recipe')->simplePaginate(20);
        return view('admin.pages.post', compact('posts', 'categories', 'tags'));
    }
    public function showCourses()
    {
        $categories = Category::all();
        $courses = Course::with('category')->simplePaginate(20);
        return view('admin.pages.course', compact('courses', 'categories'));
    }
    public function showTags()
    {
        $tags = Tag::all();
        return view('admin.pages.tag', compact('tags'));
    }
    public function showUsers()
    {
       $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function editProfile()
    {
        return view('admin.profile.edit');
    }
}
