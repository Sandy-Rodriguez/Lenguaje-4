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
<h1><b>Lista de Proyectos</b></h1>
</div>

<div class="container" >
    <h5>BUSCAR</h5>
    <div class="row" ALIGN="left">
      <div class="col-xl-12" ALIGN="">
        <form action="{{ route('proyecto.index')}}" method="get">
          <div class="form-row">
            <div class="col-sm-4">
              <input type="text" class="form-control" name="buscar" value="{{$ProyectoBuscar}}">
            </div>
            <div class="col-auto">
              <br>
              <input type="submit" class="btn btn-primary" value="Buscar">
              <a class="btn btn-success" href="{{ route('proyecto.index') }}">Volver</a>
              <a href="{{ route('proyecto.crear') }}" class="btn btn-warning">Crear</a>
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
        <th><center>FECHA DE INICIO</center></th>
        <th><center>FECHA FINAL</center></th>
        <th><center>VER</center></th>
        <th><center>EDITAR</center></th>
        <th><center>BORRAR</center></th>
    </thead>
    <tbody>
        @forelse($proyectos as $proyecto)
        <tr>
        <td><center>{{$proyecto->id}}</center></td>
        <td><center>{{$proyecto->nombre}}</center></td>
        <td><center>{{$proyecto->descripcion}}</center></td>
        <td><center>{{$proyecto->fecha_inicio}}</center></td>
        <td><center>{{$proyecto->fecha_fin}}</center></td>
        <td><center><a class="btn btn-success" href= "{{route('proyecto.show', ['id'=>$proyecto->id])}}"><u>Ver Datos del Proyecto</u></a></center></td>
        <td><center><a class="btn btn-primary" href= "{{route('proyecto.editar', ['id'=>$proyecto->id])}}"><u>Editar Datos del Proyecto</u></a></center></td>
 
        <td><center>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$proyecto->id}}">
            Eliminar Datos     
            </button>

            <form  method="post" action="{{route('proyecto.borrar',[$proyecto->id])}}">
            @method("DELETE")
            @csrf

            <div class="modal" id="modal-{{$proyecto->id}}" tabindex="-1">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title">Eliminar este Dato</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                      <div class="modal-body">
                     <p>¿QUIERE ELIMINAR PERMANENTEMENTE ESTE DATO?</p>
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
            <td>NO HAY PROYECTOS</td>
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
    {{ $proyectos->render('pagination::bootstrap-4') }}
</div>


@endsection()