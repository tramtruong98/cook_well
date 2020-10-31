<?php

namespace App\Http\Controllers;

use App\Imports\CourseImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CourseController extends Controller
{
    public function import() 
    {
        Excel::import(new CourseImport,request()->file('file'));
        return back();
    }
    
}
