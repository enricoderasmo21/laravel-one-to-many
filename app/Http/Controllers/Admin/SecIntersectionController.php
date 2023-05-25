<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class SecIntersectionController extends Controller
{
    public function intersection(Technology $technology)
    {  
        return view('admin.technologies.intersection', compact('technology'));
    }
}
