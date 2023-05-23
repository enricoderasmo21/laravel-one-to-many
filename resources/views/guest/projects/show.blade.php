@extends('layouts/app')

@section('content')

<div id="guest-show">
    <div class="back-dark">
        <div class="img-container">
            <img src="{{Vite::asset('resources/img/project-boolflix.png')}}" alt="">
        </div>
        <div class="container">

            <h2 class="text-center proj-title"> {{$project->title}} </h2>

            <div class="_label text-center">Tipo: <span class="type">{{$project->type->name}}</span></div>

            <p class="text"> {{$project->description}} </p>
    
        </div>
    </div>
</div>

@endsection