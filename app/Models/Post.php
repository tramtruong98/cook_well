<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Overtrue\LaravelLike\Traits\Likeable;

class Post extends Model
{
    use HasFactory, Likeable, Searchable;
    protected $table = 'posts';
    protected $fillable = [
        'recipe_id',
        'home_flag',
        'blog_flag',
        'rate',
        'cate_id',
        'course_id',
        'image',
    ];
    public function recipe()
    {
        return $this->belongsTo('App\Models\Recipe', 'recipe_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
    public function tags() {
        return $this->belongsToMany('App\Models\Tag', 'post_tag', 'post_id', 'tag_id');
    }
    public function getRouteKeyName()
    {
        return 'recipe_id';
    }

    public function getScoutKey()
    {
        return $this->recipe_id;
    }

    public function searchableAs()
    {
        return 'posts_index';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        $author = $this->recipe->author;

        //$array = $this->transform($array);

        //$array['category'] = $this->category->name;
        $array['course_name'] = $this->course->name;
        $array['course_description'] = $this->course->description;
        $array['recipe_title'] = $this->recipe->title;
        $array['recipe_minutes'] = $this->recipe->minutes;
        $array['recipe_ingredients'] = $this->recipe->ingredients;
        $array['recipe_description'] = $this->recipe->description;
        $array['tag'] = $this->tag->title;
        $array['author'] = $author;

        return $array;
    }
}
