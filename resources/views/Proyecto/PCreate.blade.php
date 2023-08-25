@extends('layout')

@section('titulo','Create')

@section('contenido')

<br><br>
<form  method="POST" action="{{route('proyecto.crear')}}" class0="needs-validation">
@csrf


  <h4 class="card-header"><center><b><ul>CREAR DATOS DEL PROYECTO</ul></b></center></h4>
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

    <div><center>
    <input type="submit" class="btn btn-primary" value="Crear">
    <a href="{{ route('proyecto.index') }}" class="btn btn-success">Volver</a>
    </center></div>

   </div>
  </div>
</form>
@endsection()