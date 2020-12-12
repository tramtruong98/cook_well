<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        //$request = "Mary";
        $users = User::search($request->searchAdmin)->get();
        //$number = $posts->count();
        return view('admin.pages.search', compact('users'));
    }
}
