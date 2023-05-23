@extends('layouts.admin.admin-layout')

@section('content')

<div id="admin_edit_create" class="bg-black">

    <div class="container">
    
        <h2 id="proj-title">Modifica {{$project->title}}</h2>

        <form action="{{route('admin.projects.update', $project->slug)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label class="form-label text-light" for="title">Titolo</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value='{{old('title') ?? $project->title}}'>
              
              @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label text-light" for="description">Descrizione</label>
              <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description') ?? $project->description}}</textarea>
              
              @error('description')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror 
            </div>

            <div class="mb-3">
              <label class="form-label text-light" for="image">Percorso immagine</label>
              <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value='{{old('image') ?? $project->image}}'>
              
              @error('image')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror 
            </div>

            <div class="mb-3">
              <label class="form-label text-light" for="creation_date">Data di creazione</label>
              <input type="text" class="form-control @error('creation_date') is-invalid @enderror" id="creation_date" name="creation_date" value='{{old('creation_date') ?? $project->creation_date}}'>
              
              @error('creation_date')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror 
            </div>

            <button type="submit" class="btn btn-outline-danger">MODIFICA</button>
        </form>
    </div>
</div>




@endsection