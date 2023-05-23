@extends('layouts.admin.admin-layout')

@section('content')

<div id="admin-index">
  <div class="container">
      <table class="table table-striped border">
          <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Data</th>
                <th scope="col">Linguaggio</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($projects as $project)
              
              <tr>
                <td>{{$project->title}}</td>
                <td>{{$project->description}}</td>
                <td>{{$project->creation_date}}</td>
                <td>{{$project->techs}}</td>
                <td><a href="{{route('admin.projects.show', $project->slug)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
              </tr>
              
              @endforeach
            </tbody>
      </table>
  </div>
</div>



@endsection


