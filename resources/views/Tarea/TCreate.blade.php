@extends('layout')

@section('titulo','Create')

@section('contenido')

<br><br>
<form  method="POST" action="{{route('tarea.crear')}}" class0="needs-validation">
@csrf


  <h4 class="card-header"><center><b><ul>CREAR DATOS DE LA TAREA</ul></b></center></h4>
    <div class="card">
    <div class="card-body">

    <div class="card-title"><center><b>Nombre:</b>
    <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
    name="nombre"  id="nombre" placeholder="Ingrese el nombre" value="{{old('nombre')}}">
    
    @error('nombre')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>

    <div class="card-title"><center><b>Descripcion:</b>
    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" 
    name="descripcion"  id="descripcion" placeholder="Ingrese el descripcion" value="{{old('descripcion')}}">

    @error('descripcion')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>


    <div class="card-title"><center><b>Estado:</b>
    <input type="text" class="form-control @error('estado') is-invalid @enderror" 
    name="estado"  id="estado" placeholder="Ingrese el estado" value="{{old('estado')}}">

    @error('estado')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>


    <div class="card-title"><center><b>Fecha de Inicio:</b>
    <input type="text" class="form-control @error('fecha_inicio') is-invalid @enderror" 
    name="fecha_inicio"  id="fecha_inicio" placeholder="Ingrese la fecha de inicio" value="{{old('fecha_inicio')}}">

    @error('fecha_inicio')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>

    <div class="card-title"><center><b>Fecha final:</b>
    <input type="text" class="form-control @error('fecha_fin') is-invalid @enderror" 
    name="fecha_fin"  id="fecha_fin" placeholder="Ingrese la fecha final" value="{{old('fecha_fin')}}">

    @error('fecha_fin')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>


    <div class="card-title"><center><b>ID del Proyecto:</b>
    <input type="text" class="form-control @error('proyecto_id') is-invalid @enderror" 
    name="proyecto_id"  id="proyecto_id" placeholder="Ingrese el id del proyecto" value="{{old('proyecto_id')}}">

    @error('proyecto_id')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>



    <div class="card-title"><center><b>ID del Usuario:</b>
    <input type="text" class="form-control @error('usuario_id') is-invalid @enderror" 
    name="usuario_id"  id="usuario_id" placeholder="Ingrese el id del usuario" value="{{old('usuario_id')}}">

    @error('usuario_id')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>






    <div><center>
    <input type="submit" class="btn btn-primary" value="Crear">
    <a href="{{ route('tarea.index') }}" class="btn btn-success">Volver</a>
    </center></div>

   </div>
  </div>
</form>
@endsection()