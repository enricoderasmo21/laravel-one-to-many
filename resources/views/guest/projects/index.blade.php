@extends('layouts/app')

@section('content')

<div id="guest-index">
    <div class="back-dark">
        <div class="container">
            <div class="cards-container py-5">

                @foreach($projects as $project)

                <div class="card border-dark" style="width: 18rem;">
                    <img src="{{$project->image}}" class="card-img-top" alt="project image">
                    <div class="card-body">
                      <h5 class="card-title">{{$project->title}}</h5>
                      
                      <a href="{{route('projects.show', $project)}}" class="btn btn-outline-danger">ESPLORA</a>
                    </div>
                </div>

                @endforeach

            </div>
    
        </div>
    </div>
</div>

@endsection