@extends('layouts.admin.admin-layout')

@section('content')
<div id="admin-dash">
    <div class="container">
        <a href="{{route('admin.projects.index')}}">Gestisci i tuoi progetti</a>
        <a href="{{route('admin.projects.create')}}">Aggiungi un progetto</a>

        <a href="{{route('admin.types.index')}}">Gestisci le tipologie di progetto</a>
    </div>
</div>
@endsection