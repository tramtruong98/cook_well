<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserRole extends Pivot
{
    use HasFactory;
    protected $table = 'user_role';
    public $incrementing = true;
    // public function user(){
    //     return $this->belongsTo('App\Models\User');
    // }
    // public function role(){
    //     return $this->belongsTo('App\Models\Role');
    // }
}
