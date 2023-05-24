<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.types.index', compact('types'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
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
        $type = new Type();
        $type->fill($formData);
        $type->slug = Str::slug($type->name);
        $type->save();

        return redirect()->route('admin.types.show', $type->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $this->validation($request);

        $formData = $request->all();
        $type->slug = Str::slug($formData['name'], '-');
        $type->update($formData);
        return redirect()->route('admin.types.show', $type->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        
        return redirect()->route('admin.projects.index');
    }

    private function validation($request){

        $formData = $request->all();

        $validator = Validator::make($formData, [

            // Qui va inserito l'array

            'name' => 'required|max:20',
            'description' => 'required|max:200',
        ], [
            'name.required' => 'Devi inserire il titolo del tipo!',
            'name.max' => 'Non puoi inserire più di 20 caratteri!',

            'description.required' => 'Devi inserire la descrizione del tipo!',
            'description.max' => 'Non puoi inserire più di 200 caratteri!',
            
        ])->validate(); 
        
        return $validator;
    }
}
