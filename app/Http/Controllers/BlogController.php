<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Post;
use App\Models\Recipe;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('pages.blog', compact('posts', 'categories'));
    }
    public function showBlog($id)
    {
        $post = Post::where('id', $id)->first();
        $author = User::where('id', $post->recipe->author)->first();
        return view('pages.blog-single', compact('post', 'author'));
    }
    public function postRecipe(Request $request)
    {
         DB::beginTransaction();
          try {
        $post = new Post;
        $recipe = new Recipe;
        //$check = Course::where('name', $request->name);
        $check = Course::where('name', $request->name)->first();
        if ($check != null) {
            $recipe->course_id = $check->id;
        }
        $course = new Course;
        $course->cate_id = $request->category;
        $course->name = $request->name;
        $course->save();
        $recipe->course_id = $course->id;
        $recipe->title = $request->title;
        $recipe->cate_id = $request->category;
        $recipe->minutes = $request->minutes;
        $recipe->description = $request->description;
        $recipe->ingredients = $request->ingredients;
        $recipe->save();
        //$recipe->author = Auth::user()->id;
        $post->recipe_id = 1;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/products/' . $filename);
            // Image::make($image)->resize(300, 100)->save($location);
            Image::make($request->file('image'))->resize(300, 200)->save($location);
            $post->image = $location;
        }
        $post->course_id = $recipe->course_id;
        $post->rate = 0;
        $post->cate_id = $request->category;
        $post->save();
         DB::commit();
         return redirect()->back();
          } catch (\Exception $e) {
              dd($e);
              DB::rollback();
             abort(500);
        }
    }
}
