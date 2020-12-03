<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $table = 'recipes';
    protected $fillable = [
        'cate_id',
        'course_id',
        'title',
        'minutes',
        'ingredients',
        'description',
        'author',
    ];
    public function post()
    {
        return $this->hasOne('App\Models\Post', 'recipe_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'cate_id');
    }
    public function author()
    {
        return $this->belongsTo('App\Models\User', 'author');
    }
    public function getAuthor()
    {
        $author = User::where('id', $this->author)->first();
        return $author->name;
    }
}
