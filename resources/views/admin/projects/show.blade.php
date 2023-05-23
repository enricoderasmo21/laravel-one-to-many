@extends('layouts.admin.admin-layout')

@section('content')

<div id="admin_show">

    <div class="container mt-3 text-center">
    
        <h2>{{$project->title}}</h2>

        <div id="info-container">
            <div id="img-container">
                <img src="{{$project->image}}" alt="">
            </div>
            <div id="inner-right">
                <p> {{$project->description}}</p>
                <hr>
                <div>Tipo: {{$project->type->name ?? 'indefinito'}}</div>

                <div id="btn-container">
                    <button class="btn btn-primary">
                        <a href="{{route('admin.projects.edit', $project->slug)}}">MODIFICA</a>
                    </button>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        RIMUOVI
                    </button>
        
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Elimina il progetto</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Sei sicuro di voler eliminare {{$project->title}}?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                              <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">RIMUOVI</button>
                              </form>
                              
                            </div>
                          </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script type="text/javascript">

const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})

</script>

@endsection