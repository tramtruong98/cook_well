<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Post;
use App\Models\Recipe;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function showRecipes()
    {
        $recipes = Recipe::all();
        return view('admin.pages.recipe', compact('recipes'));
    }
    public function showPosts()
    {
        $posts = Post::all();
        return view('admin.pages.post', compact('posts'));
    }
    public function showCourses()
    {
        $courses = Course::all();
        return view('admin.pages.course', compact('courses'));
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
