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
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post')
                        ->using('App\Models\PostTag')
                        ->withPivot([
                            'created_by',
                            'updated_by',
                        ]);
    }
}
