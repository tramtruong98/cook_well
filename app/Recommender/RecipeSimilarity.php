<?php

namespace App\Recommender;

use App\Models\Recipe;
use Exception;

class RecipeSimilarity
{
    protected $recipes       = [];
    protected $nameWeight  = 1;
    protected $ingredientWeight    = 1;
    protected $categoryWeight = 1;
    protected $minuteHighRange = 1000;

    public function __construct(array $recipes)
    {
        $this->recipes       = $recipes;
        $this->minuteHighRange = max(array_column($recipes, 'minutes'));
    }

    public function setnameWeight(float $weight): void
    {
        $this->nameWeight = $weight;
    }

    public function setIngredientWeight(float $weight): void
    {
        $this->ingredientWeight = $weight;
    }

    public function setCategoryWeight(float $weight): void
    {
        $this->categoryWeight = $weight;
    }

    public function calculateSimilarityMatrix(): array
    {
        $matrix = [];
        //dd($this->recipes);

        foreach ($this->recipes as $recipe) {

            $similarityScores = [];

            foreach ($this->recipes as $_recipe) {
                //dd($recipe['id']);
                if ($recipe['id'] == $_recipe['id']) {
                    continue;
                }
                $similarityScores['recipeid_' . $_recipe['id']] = $this->calculateSimilarityScore($recipe, $_recipe);
            }
            $matrix['recipeid_' . $recipe['id']] = $similarityScores;
        }
        return $matrix;
    }

    public function getRecipesSortedBySimularity(int $recipeId, array $matrix): array
    {
        $similarities[]   = $matrix ?? null;
        $sortedRecipes = [];
        //dd($matrix);

        if (is_null($similarities)) {
            throw new Exception('Can\'t find recipe with that ID.');
        }
        arsort($similarities);
        //dd($similarities);
        
        foreach ($similarities as $similarity) {
            //dd($similarity);
            foreach($similarity as $key => $value) {
                $idSelected   = intval(str_replace('recipeid_', '', $key));
                if($idSelected == $recipeId) {
                    foreach ($value as $keySub => $valueSub) {
                        $idSimilar   = intval(str_replace('recipeid_', '', $keySub));
                        //dd($valueSub >= 0.5);
                        if($idSimilar != $recipeId && $valueSub >= 0.5) {
                            $sortedRecipes[] = Recipe::where('id', $idSimilar)->first();
                        }
                    }
                }
            }
            //dd($idSimilar);

            // $id       = intval(str_replace('recipeid_', '', $productIdKey));
            // $recipes = array_filter($this->recipes, function ($recipe) use ($id) { return $recipe['id'] === $id; });
            // if (Recipe::where('id', $id)->first() == null) {
            //     continue;
            // }
            // dd(Recipe::where('id', $id)->first() == null);
            // $recipe = $recipes[array_keys($recipes)[0]];
            // $recipe->similarity = $similarity;
        }
        //dd($sortedRecipes);
        return $sortedRecipes;
    }

    protected function calculateSimilarityScore($recipeA, $recipeB)
    {
        //dd($recipeA['ingredients']);
        //RecipeAingredients = implode('', get_object_vars($recipeA->ingredients));
        $recipeAingredients = $recipeA['ingredients'];
        $recipeBingredients = $recipeB['ingredients'];
        //$recipeBFeatures = implode('', get_object_vars($recipeB->ingredients));
        $cateA = Recipe::where('id', $recipeA['id'])->first()->category->name;
        $cateB = Recipe::where('id', $recipeB['id'])->first()->category->name;
        //dd($cateB);
        return array_sum([
            (Similarity::hamming($recipeAingredients, $recipeBingredients) * $this->nameWeight),
            (Similarity::euclidean(
                Similarity::minMaxNorm([$recipeA['minutes']], 0, $this->minuteHighRange),
                Similarity::minMaxNorm([$recipeB['minutes']], 0, $this->minuteHighRange)
            ) * $this->ingredientWeight),
            (Similarity::jaccard($cateA, $cateB) * $this->categoryWeight)
        ]) / ($this->nameWeight + $this->ingredientWeight + $this->categoryWeight);
    }
}
