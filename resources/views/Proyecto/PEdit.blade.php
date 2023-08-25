@extends('layout')

@section('titulo','Edit')

@section('contenido')

<br><br>
<form  method="POST" action="{{route('proyecto.update',[$proyectos->id])}}" class0="needs-validation">
@method("PUT")
@csrf

  <h4 class="card-header"><center><b><ul>Editar datos del proyecto</ul></b></center></h4>
    <div class="card">
    <div class="card-body">

    <div class="card-title"><center><b>Nombre:</b>
    <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
    name="nombre"  id="nombre" placeholder="Ingrese el nuevo nombre" value="{{old('nombre') ?? $proyectos->nombre}}">
    
    @error('nombre')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>

    <div class="card-title"><center><b>Descripcion:</b>
    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" 
    name="descripcion"  id="descripcion" placeholder="Ingrese la nueva descripcion" value="{{old('descripcion') ?? $proyectos->descripcion}}">

    @error('descripcion')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>

    <div class="card-title"><center><b>Fecha de Inicio:</b>
    <input type="text" class="form-control @error('fecha_inicio') is-invalid @enderror" 
    name="fecha_inicio"  id="fecha_inicio" placeholder="Ingrese la nuveva fecha de inicio" value="{{old('fecha_inicio') ?? $proyectos->fecha_inicio}}">

    @error('fecha_inicio')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>

    <div class="card-title"><center><b>Fecha Final:</b>
    <input type="text" class="form-control @error('fecha_fin') is-invalid @enderror" 
    name="fecha_fin"  id="fecha_fin" placeholder="Ingrese la nueva fehca final" value="{{old('fecha_fin') ?? $proyectos->fecha_fin}}">

    @error('fecha_fin')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>

    <div><center>
    <input type="submit" class="btn btn-primary" value="Editar">
    <a href="{{ route('proyecto.index') }}" class="btn btn-success">Volver</a>
    </center></div>

   </div>
  </div>
</form>
@endsection()