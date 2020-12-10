<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Recipe;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

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
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.my-blog', compact('recipes', 'categories', 'tags'));
    }
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::where('id', Auth::user()->id)->first();
            $profile = $user->profile;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->new);
            $profile->manifesto = $request->manifesto;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('img/avatars/' . $filename);
                // Image::make($image)->resize(300, 100)->save($location);
                Image::make($request->file('image'))->resize(200, 200)->save($location);
                $profile->avatar = $filename;
            }
            $user->save();
            $profile->save();
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            abort(500);
        }
    }
    public function deleteBlog($id)
    { 
        $post = Post::where('id', $id)->first();
        $idRecipe = $post->recipe->id;
        Post::destroy($id);
        Recipe::destroy($idRecipe);
        return redirect('/my-blog')->with('success', 'Post deleted successfully');
    }
}
