@extends('layout')

@section('titulo','Show')

@section('contenido')

<br>
<br>
<div class="container" style="max-width: 500px;" >
<div class="card" style="width: 30rem;">
  <div class="card-header">
   <center><b> Datos de la Tarea</b></center>
  </div>
  <ul class="list-group list-group-flush">
  <center><li class="list-group-item"><b>Nombre:</b> <br> {{$tarea->nombre}}</li></center>
  <center> <li class="list-group-item"><b>Descripcion:</b> <br> {{$tarea->descripcion}}</li></center>
  <center> <li class="list-group-item"><b>Estado:</b> <br> {{$tarea->estado}}</li></center>
  <center><li class="list-group-item"><b>Fecha de Inicio:</b> <br> {{$tarea->fecha_inicio}}</li></center>
  <center><li class="list-group-item"><b>Fecha Final:</b> <br> {{$tarea->fecha_fin}}</li></center>
  <center><li class="list-group-item"><b>ID del Proyecto:</b> <br> {{$tarea->proyecto_id}}</li></center>
  <center><li class="list-group-item"><b>ID del usuario:</b> <br> {{$tarea->usuario_id}}</li></center>

  
<div><center>
    <a href="{{ route('tarea.index') }}" class="btn btn-success">Volver</a>
    </center></div>
</div>
</ul>

@endsection()