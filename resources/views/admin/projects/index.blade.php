@extends('layouts.admin.admin-layout')

@section('content')

<h2 class="text-center">PROGETTI</h2>

<div id="admin-index">
  <div class="container">
    <table class="table table-striped border">
      <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Tipo</th>
            <th scope="col">Data</th>
            <th></th>
          </tr>
      </thead>
      <tbody>
        @foreach ($projects as $project)
        
        <tr>
          <td>{{$project->title}}</td>
          <td>{{ substr($project->description, 0, 80,) }}...</td>
          <td>{{$project->type->name ?? 'indefinito'}}</td>
          <td>{{$project->creation_date}}</td>
          <td><a href="{{route('admin.projects.show', $project->slug)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
        </tr>
  
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection


