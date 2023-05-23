@extends('layouts.admin.admin-layout')

@section('content')

<div id="admin_edit_create" class="bg-black">

    <div class="container">
    
        <h2 id="proj-title">Aggiungi un nuovo tipo</h2>

        <form action="{{route('admin.types.store')}}" method="POST">
            @csrf
            
            <div class="mb-3">
              <label class="form-label text-light" for="name">Nome</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value='{{old('name')}}'>
              
              @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label text-light" for="description">Descrizione</label>
              <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description')}}</textarea>
              
              @error('description')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror 
            </div>

            <button type="submit" class="btn btn-primary">AGGIUNGI</button>
        </form>
    </div>
</div>

@endsection