<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        return view('admin.projects.create', compact('types'));
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
        $newProject = new Project();
        $newProject->fill($formData);
        $newProject->slug = Str::slug($newProject->title);
        $newProject->save();

        return redirect()->route('admin.projects.show', $newProject->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validation($request);
        
        $formData = $request->all();
        $project->slug = Str::slug($formData['title'], '-');
        $project->update($formData);
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        
        return redirect()->route('admin.projects.index');
    }

    private function validation($request){

        $formData = $request->all();

        $validator = Validator::make($formData, [

            // Qui va inserito l'array

            'title' => 'required|max:50|min:4',
            'description' => 'required|max:800|min:10',
            'image' => 'required',
            'creation_date' => 'required|date',
            'type_id' => 'nullable|exists:types,id'
        ], [
            'title.required' => 'Devi inserire il titolo del progetto!',
            'title.max' => 'Non puoi inserire più di 50 caratteri!',
            'title.min' => 'Devi inserire almeno 4 caratteri!',

            'description.required' => 'Devi inserire la descrizione del progetto!',
            'description.max' => 'Non puoi inserire più di 1000 caratteri!',
            'description.min' => 'Devi inserire almeno 10 caratteri!',

            'image.required' => "Devi inserire il percorso dell'immagine del progetto!",

            'creation_date.required' => 'Devi inserire la data del progetto!',
            'creation_date.date' => 'Questo campo deve contenere una data valida!',

            'type_id.exists' => 'Il tipo deve essere presente nel nostro sito!',
            
        ])->validate(); 
        
        return $validator;
    }
}
