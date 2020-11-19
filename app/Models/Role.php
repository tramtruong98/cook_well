<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = [
        'role',
        'description',
    ];
    public function users()
    {
        return $this->belongsToMany('App\Models\User')
                        ->using('App\Models\UserRole')
                        ->withPivot([
                            'created_by',
                            'updated_by',
                        ]);
    }
}
