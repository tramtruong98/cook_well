<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $fillable = [
        'tag',
        'title',
    ];
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}
