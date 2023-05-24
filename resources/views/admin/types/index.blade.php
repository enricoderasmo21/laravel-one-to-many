@extends('layouts.admin.admin-layout')

@section('content')

<h2 class="text-center text-danger fs-1">TIPI</h2>

<div id="admin-index">
  <div class="container">
      <table class="table table-striped border">
          <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th>N. progetti</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($types as $type)
              
              <tr>
                <td>{{$type->name}}</td>
                <td>{{$type->description}}</td>
                <td> <a href="{{route('admin.intersection', $type)}}">{{ count($type->projects) }}</a></td>
                <td><a href="{{route('admin.types.show', $type->slug)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
              </tr>
              
              @endforeach
            </tbody>
      </table>
  </div>
</div>

@endsection