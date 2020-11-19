<?php

namespace App\Http\Controllers;

use App\Followable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{

    public function store($id)
    {
        $user = User::where('id', $id)->first();
        $response = Auth::user()->toggleFollow($user);
        return redirect()->back();
    }
}
