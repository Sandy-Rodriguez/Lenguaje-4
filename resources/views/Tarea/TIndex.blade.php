@extends('layout')

@section('titulo','index')

@section('contenido')

@if(session('mensaje'))
    <div class="alert alert-success d-flex align-items-center position-relative" role="alert">
        {{session('mensaje')}}
        <button type="button" class="btn-close position-absolute top-1 end-0" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<br>
<h1><b>Lista de Tareas</b></h1>
</div>

<div class="container" >
    <h5>BUSCAR</h5>
    <div class="row" ALIGN="left">
      <div class="col-xl-12" ALIGN="">
        <form action="{{ route('tarea.index')}}" method="get">
          <div class="form-row">
            <div class="col-sm-4">
              <input type="text" class="form-control" name="buscar" value="{{$TareaBuscar}}">
            </div>
            <div class="col-auto">
              <br>
              <input type="submit" class="btn btn-primary" value="Buscar">
              <a class="btn btn-success" href="{{ route('tarea.index') }}">Volver</a>
              <a href="{{ route('tarea.crear') }}" class="btn btn-warning">Crear</a>
            </div>
          </div>
        </form>
      </div>
      <div class="col-xl-12">
      </div>
    </div>
  </div>
 <br>

<div class="container"> 
<table class="table table-bordered border-black" class>
    <thead class="table-primary">
        <th><center>ID</center></th>
        <th><center>NOMBRE</center></th>
        <th><center>DESCRIPCION</center></th>
        <th><center>ESTADO</center></th>
        <th><center>ID DE PROYECTO</center></th>
        <th><center>ID DE USUARIO</center></th>
        <th><center>VER</center></th>
        <th><center>EDITAR</center></th>
        <th><center>BORRAR</center></th>
    </thead>
    <tbody>
        @forelse($tareas as $tarea)
        <tr>
        <td><center>{{$tarea->id}}</center></td>
        <td><center>{{$tarea->nombre}}</center></td>
        <td><center>{{$tarea->descripcion}}</center></td>
        <td><center>{{$tarea->estado}}</center></td>
        <td><center>{{$tarea->proyecto_id}}</center></td>
        <td><center>{{$tarea->usuario_id}}</center></td>
        <td><center><a class="btn btn-success" href= "{{route('tarea.show', ['id'=>$tarea->id])}}"><u>Ver Datos de la Tarea</u></a></center></td>
        <td><center><a class="btn btn-primary" href= "{{route('tarea.editar', ['id'=>$tarea->id])}}"><u>Editar Datos de la Tarea</u></a></center></td>
 
        <td><center>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$tarea->id}}">
            Eliminar Datos     
            </button>

            <form  method="post" action="{{route('tarea.borrar',[$tarea->id])}}">
            @method("DELETE")
            @csrf

            <div class="modal" id="modal-{{$tarea->id}}" tabindex="-1">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title">Eliminar este Dato</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                      <div class="modal-body">
                     <p>¿QUIEREs ELIMINAR PERMANENTEMENTE ESTE DATO?</p>
                    </div>
                    <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                     <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                  </div>
               </div>
            </div>
            </form>
         </center></td>
          
        </tr>
        @empty
        <tr>
            <td>NO HAY TAREAS</td>
        </tr>
        @endforelse

    </tbody>
</table>
</div>
<br>

<style>
    .custom-center {
        display: flex;
        justify-content: center;
    }
</style>

<div class="custom-center">
    {{ $tareas->render('pagination::bootstrap-4') }}
</div>


@endsection()