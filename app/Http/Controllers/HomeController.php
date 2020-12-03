<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Recipe;
use App\Recommender\RecipeSimilarity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();
        $recipes = Recipe::all();
        //dd($recipes);
        
        $selectedId      = intval(app('request')->input('id') ?? '5');
        //dd($selectedId);
    
        $selectedRecipe = $recipes[0];
        //dd($selectedRecipe);
    
    
    
        //$selectedRecipes = array_filter($recipes->toArray(), function ($recipe) use ($selectedId) { return $recipe->id === $selectedId; });
        $selectedRecipes = $recipes->filter(function($recipe) use ($selectedId) 
        {
            return $recipe->id == $selectedId;
        });
        if (count($selectedRecipes)) {
    
            $selectedRecipe = $selectedRecipes[array_keys($selectedRecipes->toArray())[0]];
    
        }
    
    
    
        $recipesimilarity = new RecipeSimilarity($recipes->toArray());
    
        $similarityMatrix  = $recipesimilarity->calculateSimilarityMatrix();
        //dd($similarityMatrix);
    
        $recipes          = $recipesimilarity->getRecipesSortedBySimularity($selectedId, $similarityMatrix);
        //dd( $recipes);
        return view('home', compact('categories', 'posts', 'recipes'));
    }
}
