@extends('layouts.admin.admin-layout')

@section('content')

<div id="admin_edit_create" class="bg-black">

    <div class="container">
    
        <h2 id="proj-title">Modifica {{$technology->name}}</h2>

        <form action="{{route('admin.technologies.update', $technology->slug)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label class="form-label text-light" for="name">Nome</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value='{{old('name') ?? $type->name}}'>
              
              @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label text-light" for="color">Colore</label>
              <textarea type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color">{{old('color') ?? $type->color}}</textarea>
              
              @error('color')
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