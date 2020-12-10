<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Post;
use App\Models\Recipe;
use App\Models\Tag;
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
        $authors = User::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.blog', compact('posts', 'categories', 'authors', 'tags'));
    }
    public function showUserRecipe($id)
    {
        $recipes = Recipe::where('author', $id)->get();
        return view('pages.user-recipes', compact('recipes'));
    }
    public function showBlog($id)
    {
        $post = Post::where('id', $id)->first();
        $author = User::where('id', $post->recipe->author)->first();
        $comments = Comment::where('post_id', $id)->get();
        $categories = Category::all();
        $tags = Tag::all();
        //$img = $post->image->substr()
        return view('pages.blog-single', compact('post', 'author', 'comments', 'categories', 'tags'));
    }
    public function postComment(Request $request, $id)
    {
        DB::beginTransaction();
          try {
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;
        $comment->content = $request->content;  
        $comment->save();
         DB::commit();
         return redirect()->back()->with('message', 'Create successfully!');
          } catch (\Exception $e) {
              DB::rollback();
             abort(500);
        }

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
        $course->description = $request->title;
        $course->save();
        $recipe->course_id = $course->id;
        $recipe->title = $request->title;
        $recipe->cate_id = $request->category;
        $recipe->minutes = $request->minutes;
        $recipe->ingredients = $request->ingredients;
        $recipe->description = $request->description;
        $recipe->author = Auth::user()->id;
        $recipe->save();
        $post->recipe_id = $recipe->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/products/' . $filename);
            // Image::make($image)->resize(300, 100)->save($location);
            Image::make($request->file('image'))->resize(400, 300)->save($location);
            $post->image = $filename;
        }
        //dd($post->image);
        $post->course_id = $recipe->course_id;
        $post->cate_id = $request->category;
        $post->save();
        $post->tags()->attach($request->tag);
         DB::commit();
         return redirect()->back();
          } catch (\Exception $e) {
              dd($e);
              DB::rollback();
             abort(500);
        }
    }
    public function likePost(Request $request)
    {
        $post = Post::where('id', $request->id)->first();
        $response = Auth::user()->toggleLike($post);
        return response()->json(['success'=>$response]);
    }
}
