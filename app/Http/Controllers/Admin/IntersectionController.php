<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class IntersectionController extends Controller
{
    public function intersection()
    {  
        $types = Type::all();

        return view('admin.types.intersection', compact('types'));
    }
}
