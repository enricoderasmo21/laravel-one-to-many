@extends('layouts.admin.admin-layout')

@section('content')

<h2 class="index-title text-center">TECNOLOGIE</h2>

<div id="admin-index">
  <div class="container">
      <table class="table table-striped border">
          <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Colore</th>
                <th>N. progetti</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($technologies as $technology)
              
              <tr>
                <td>{{$technology->name}}</td>
                <td>{{$technology->color}}</td>
                <td> <a href="{{route('admin.secIntersection', $technology)}}">{{ count($technology->projects) }}</a></td>
                <td><a href="{{route('admin.technologies.show', $technology->slug)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
              </tr>
              
              @endforeach
            </tbody>
      </table>
  </div>
</div>

@endsection