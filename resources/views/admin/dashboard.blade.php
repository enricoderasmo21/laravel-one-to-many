@extends('layouts.admin.admin-layout')

@section('content')
<div id="admin-dash">
    <div class="container">
      
      <div class="cards-container">

        <div class="card" style="width: 18rem;">
          <div class="card-header text-danger fs-3 text-center">
            Progetti
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="{{route('admin.projects.index')}}">Gestisci</a></li>
            <li class="list-group-item"><a href="{{route('admin.projects.create')}}">Crea</a></li>
          </ul>
        </div>
        
        <div class="card" style="width: 18rem;">
          <div class="card-header text-danger fs-3 text-center">
            Tipi
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="{{route('admin.types.index')}}">Gestisci</a></li>
            <li class="list-group-item"><a href="{{route('admin.types.create')}}">Crea</a></li>
          </ul>
        </div>

        <div class="card" style="width: 18rem;">
          <div class="card-header text-danger fs-3 text-center">
            Tecnologie
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="{{route('admin.technologies.index')}}">Gestisci</a></li>
            <li class="list-group-item"><a href="{{route('admin.technologies.create')}}">Crea</a></li>
          </ul>
        </div>
      </div>
    </div>
</div>
@endsection