<?php

namespace App\Http\Controllers;

use App\Imports\RecipeImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RecipeController extends Controller
{
    public function import() 
    {
        Excel::import(new RecipeImport,request()->file('file'));
        return back();
    }
}
