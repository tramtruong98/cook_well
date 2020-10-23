<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'recipe_id',
        'home_flag',
        'blog_flag',
        'rate',
    ];
    public function recipe(){
        return $this->belongsTo('App\Models\Recipe', 'recipe_id');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
