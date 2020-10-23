<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'cate_id',
        'name',
        'description',
    ];
    public function category(){
        return $this->belongsTo('App\Models\Category', 'cate_id', 'id');
    }
    public function recipes(){
        return $this->hasMany('App\Models\Recipe');
    }
}
