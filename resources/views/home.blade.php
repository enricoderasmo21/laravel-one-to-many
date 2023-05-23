@extends('layouts.app')
@section('content')
<div id="home">
    <div class="_container">
    
        <div class="left-inner">
            <div id="first-sec">
                <div id="hello">
                    Hello
                </div>
                <div id="_row"></div>
            </div>
            <div id="name">
                I am Enrico D'Erasmo
            </div>
            <div id="grade">
                Junior Web Developer
            </div>
            <button class="btn btn-outline-danger mt-5">
                <a href="{{route('projects.index')}}">PROJECTS</a> 
            </button>
        </div>
    
        <div class="right-inner">
            <div id="img-container">
                <img src="https://ltidecivil.tecnico.ulisboa.pt/wp-content/uploads/2019/09/HTML5_Badge_512.png" alt="">
            </div>
    
        </div>
    </div>
</div>
@endsection