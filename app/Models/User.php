<?php

namespace App\Models;

//use App\Followable;
use App\Likable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelFollow\Followable;
use Overtrue\LaravelLike\Traits\Liker;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable, Liker;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function recipes(){
        return $this->hasMany('App\Models\Recipe');
    }
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
    public function timeline()
    {
        $friends = $this->follows()->pluck('id');

        return Recipe::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->orderByDesc('id')
            ->paginate(50);
    }
    // public function likes()
    // {
    //     return $this->hasMany(Like::class);
    // }
    public function profile()
    {
        return $this->hasOne('App\Models\Profile', 'user_id');

    }
    public function roles() {
        return $this->belongsToMany('App\Models\Role', 'user_role', 'user_id', 'role_id');
    }
}
