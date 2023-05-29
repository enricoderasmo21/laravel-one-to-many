<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $types = Type::all();

        return view('admin.projects.index', compact('projects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $formData = $request->all();
        
        $this->validation($request);
        $project = new Project();

        if($request->hasFile('image')){

            $path = Storage::put('project_images', $request->image);
            $formData['image'] = $path;
        }

        $project->fill($formData);
        $project->slug = Str::slug($project->title);
        $project->save();

        if(array_key_exists('technologies', $formData)){

            $project->technologies()->attach($formData['technologies']);
        }

        return redirect()->route('admin.projects.show', $project->slug);
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
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
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
        $formData = $request->all();
        
        $this->validation_edit($request);

        if($request->hasFile('image')){

            if($project->image){

                Storage::delete($project->image);
            }

            $path = Storage::put('project_images', $request->image);
            $formData['image'] = $path;
        }
        
        $project->slug = Str::slug($formData['title'], '-');
        $project->update($formData);

        if(array_key_exists('technologies', $formData)){

            $project->technologies()->sync($formData['technologies']);
        } else {

            $project->technologies()->detach();
        }

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
        if($project->image){

            Storage::delete($project->image);
        }

        $project->delete();
        
        return redirect()->route('admin.projects.index');
    }

    private function validation($request){

        $formData = $request->all();

        $validator = Validator::make($formData, [

            'title' => 'required|max:50|min:4',
            'description' => 'required|max:800|min:10',
            'image' => 'required|image|max:4096',
            'creation_date' => 'required|date',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id' 
        ], [
            'title.required' => 'Devi inserire il titolo del progetto!',
            'title.max' => 'Non puoi inserire più di 50 caratteri!',
            'title.min' => 'Devi inserire almeno 4 caratteri!',

            'description.required' => 'Devi inserire la descrizione del progetto!',
            'description.max' => 'Non puoi inserire più di 1000 caratteri!',
            'description.min' => 'Devi inserire almeno 10 caratteri!',

            'image.required' => "Devi inserire l'immagine del progetto!",
            'image.max' => "La dimensione del file è troppo grande!",
            'image.image' => "Il file deve essere di tipo immagine!",

            'creation_date.required' => 'Devi inserire la data del progetto!',
            'creation_date.date' => 'Questo campo deve contenere una data valida!',

            'type_id.exists' => 'Il tipo deve essere presente nel nostro sito!',

            'technologies.exists' => 'La tecnologia deve essere presente nel nostro sito!',
            
        ])->validate(); 
        
        return $validator;
    }

    private function validation_edit($request){

        $formData = $request->all();

        $validator = Validator::make($formData, [

            'title' => 'required|max:50|min:4',
            'description' => 'required|max:800|min:10',
            'image' => 'nullable|image|max:4096',
            'creation_date' => 'required|date',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id' 
        ], [
            'title.required' => 'Devi inserire il titolo del progetto!',
            'title.max' => 'Non puoi inserire più di 50 caratteri!',
            'title.min' => 'Devi inserire almeno 4 caratteri!',

            'description.required' => 'Devi inserire la descrizione del progetto!',
            'description.max' => 'Non puoi inserire più di 1000 caratteri!',
            'description.min' => 'Devi inserire almeno 10 caratteri!',

            'image.max' => "La dimensione del file è troppo grande!",
            'image.image' => "Il file deve essere di tipo immagine!",

            'creation_date.required' => 'Devi inserire la data del progetto!',
            'creation_date.date' => 'Questo campo deve contenere una data valida!',

            'type_id.exists' => 'Il tipo deve essere presente nel nostro sito!',

            'technologies.exists' => 'La tecnologia deve essere presente nel nostro sito!',
            
        ])->validate(); 
        
        return $validator;
    }
}
