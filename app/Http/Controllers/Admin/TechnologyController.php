<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $formData = $request->all();
        $technology = new Technology();
        $technology->fill($formData);
        $technology->slug = Str::slug($technology->name);
        $technology->save();

        return redirect()->route('admin.technologies.show', $technology->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.create', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $this->validation($request);

        $formData = $request->all();
        $technology->slug = Str::slug($formData['name'], '-');
        $technology->update($formData);
        return redirect()->route('admin.technologies.show', $technology->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        
        return redirect()->route('admin.technologies.index');
    }

    private function validation($request){

        $formData = $request->all();

        $validator = Validator::make($formData, [

            'name' => 'required|max:20',
            'color' => 'nullable|max:7|starts_with:#',
        ], [
            'name.required' => 'Devi inserire il titolo della tecnologia!',
            'name.max' => 'Non puoi inserire più di 20 caratteri!',

            'color.starts_with' => 'Il colore deve inziare con #!',
            'color.max' => 'Non puoi inserire più di 7 caratteri!',
            
        ])->validate(); 
        
        return $validator;
    }
}
