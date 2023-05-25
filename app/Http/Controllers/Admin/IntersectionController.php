<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class IntersectionController extends Controller
{
    public function intersection(Type $type)
    {  

        return view('admin.types.intersection', compact('type'));
    }
}
