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
              <h6>Tecnologie</h6>

              <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
              @foreach($technologies as $technology)
              @if($errors->any())
                <input type="checkbox" class="btn-check" id="tag-{{$technology->id}}" autocomplete="off" name="technologies[]" value="{{$technology->id}}" @checked(in_array($technology->id, old('technologies', [])))>
              @else
                <input type="checkbox" class="btn-check" id="tag-{{$technology->id}}" autocomplete="off" name="technologies[]" value="{{$technology->id}}" @checked($project->technologies->contains($technology->id))>
              @endif  
              <label class="btn btn-outline-primary" for="tag-{{$technology->id}}">{{$technology->name}}</label>
              @endforeach
              </div>

              @error('technologies')
              <div class="text-danger">
                {{$message}}
              </div>
              @enderror 
            </div>

            <div class="mb-3">
              <label class="form-label text-light" for="type_id">Tipo</label>
              <select id="type_id" name="type_id" class="form-select @error('type_id') is-invalid @enderror" aria-label="Default select example">
                
                <option value="">Indefinito</option>
                @foreach ($types as $type)
                <option value="{{$type->id}}" {{$type->id == old('type_id', $project->type_id) ? 'selected' : ''}}>{{$type->name}}</option>   
                @endforeach
                
              </select>

              @error('type_id')
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
              <input type="text" class="form-control @error('creation_date') is-invalid @enderror" id="creation_date" name="creation_date" placeholder="yyyy-mm-dd" value='{{old('creation_date') ?? $project->creation_date}}'>
              
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