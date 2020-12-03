<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'description',
    ];

    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'cate_id');
    }
    public function recipes(){
        return $this->hasMany('App\Models\Recipe', 'cate_id');
    }
}
