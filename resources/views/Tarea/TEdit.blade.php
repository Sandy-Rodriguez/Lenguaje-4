@extends('layout')

@section('titulo','Edit')

@section('contenido')

<br><br>
<form  method="POST" action="{{route('tarea.update',[$tareas->id])}}" class0="needs-validation">
@method("PUT")
@csrf

  <h4 class="card-header"><center><b><ul>Editar datos de la tarea</ul></b></center></h4>
    <div class="card">
    <div class="card-body">

    <div class="card-title"><center><b>Nombre:</b>
    <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
    name="nombre"  id="nombre" placeholder="Ingrese el nuevo nombre" value="{{old('nombre') ?? $tareas->nombre}}">
    
    @error('nombre')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>

    <div class="card-title"><center><b>Descripcion:</b>
    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" 
    name="descripcion"  id="descripcion" placeholder="Ingrese la nueva descripcion" value="{{old('descripcion') ?? $tareas->descripcion}}">

    @error('descripcion')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>


    <div class="card-title"><center><b>Estado:</b>
    <input type="text" class="form-control @error('esatdo') is-invalid @enderror" 
    name="estado"  id="esatdo" placeholder="Ingrese el nuevo estado" value="{{old('estado') ?? $tareas->estado}}">

    @error('estado')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>


    <div class="card-title"><center><b>Fecha de Inicio:</b>
    <input type="text" class="form-control @error('fecha_inicio') is-invalid @enderror" 
    name="fecha_inicio"  id="fecha_inicio" placeholder="Ingrese la nuveva fecha de inicio" value="{{old('fecha_inicio') ?? $tareas->fecha_inicio}}">

    @error('fecha_inicio')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>

    <div class="card-title"><center><b>Fecha Final:</b>
    <input type="text" class="form-control @error('fecha_fin') is-invalid @enderror" 
    name="fecha_fin"  id="fecha_fin" placeholder="Ingrese la nueva fehca final" value="{{old('fecha_fin') ?? $tareas->fecha_fin}}">

    @error('fecha_fin')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>


    <div class="card-title"><center><b>ID del proyecto:</b>
    <input type="text" class="form-control @error('proyecto_id') is-invalid @enderror" 
    name="proyecto_id"  id="proyecto_id" placeholder="Ingrese el nuevo id del proyecto" value="{{old('proyecto_id') ?? $tareas->proyecto_id}}">

    @error('proyecto_id')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>

    <div class="card-title"><center><b>ID del usuario:</b>
    <input type="text" class="form-control @error('usuario_id') is-invalid @enderror" 
    name="usuario_id"  id="usuario_id" placeholder="Ingrese el nuevo is del usuario" value="{{old('usuario_id') ?? $tareas->usuario_id}}">

    @error('usuario_id')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>



    <div><center>
    <input type="submit" class="btn btn-primary" value="Editar">
    <a href="{{ route('tarea.index') }}" class="btn btn-success">Volver</a>
    </center></div>

   </div>
  </div>
</form>
@endsection()