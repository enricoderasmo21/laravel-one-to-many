@extends('layouts.admin.admin-layout')

@section('content')

<div id="admin_show">

    <div class="container mt-3 text-center">
    
        <h2>{{$technology->name}}</h2>

        <div id="info-type-container">
            <div id="inner-right">
                <p> {{$technology->color}}</p>
                <hr>

                <div id="btn-container">
                    <button class="btn btn-primary">
                        <a href="{{route('admin.technologies.edit', $technology->slug)}}">MODIFICA</a>
                    </button>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        RIMUOVI
                    </button>
        
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Elimina la tecnologia</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Sei sicuro di voler eliminare {{$technology->name}}?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                              <form action="{{route('admin.technologies.destroy', $technology->slug)}}" method="POST">
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