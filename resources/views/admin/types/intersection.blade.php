{{-- @extends('layouts.admin.admin-layout')

@section('content')

<h2 class="text-center text-danger fs-1">Tutti i progetti di tipo {{$type->name}}</h2>

<div id="admin-index">
  <div class="container">

    @if( count($type->projects) > 0)
    <table class="table table-striped mb-4">
      <thead>
        <th>Titolo</th>
        <th>Descrizione</th>
        <th></th>
      </thead>
  
      <tbody>
  
        @foreach($type->projects as $project)
          <tr>
            <td>{{$project->title}}</td>
            <td>{{$project->description}}</td>
            <td>
              <a href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-magnifying-glass"></i></a>
            </td>
          </tr>
        @endforeach
  
      </tbody>
    </table>
    @else
  
      <em>Nessun progetto per questo tipo</em>
        
    @endif
  
  </div>
</div>

@endsection --}}