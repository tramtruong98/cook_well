<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'post_id',
        'content',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }
}
