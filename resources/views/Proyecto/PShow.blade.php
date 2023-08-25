@extends('layout')

@section('titulo','Show')

@section('contenido')

<br>
<br>
<div class="container" style="max-width: 500px;" >
<div class="card" style="width: 30rem;">
  <div class="card-header">
   <center><b> Datos del Proyecto</b></center>
  </div>
  <ul class="list-group list-group-flush">
  <center><li class="list-group-item"><b>Nombre:</b> <br> {{$proyecto->nombre}}</li></center>
  <center> <li class="list-group-item"><b>Descripcion:</b> <br> {{$proyecto->descripcion}}</li></center>
  <center><li class="list-group-item"><b>Fecha de Inicio:</b> <br> {{$proyecto->fecha_inicio}}</li></center>
  <center><li class="list-group-item"><b>Fecha Final:</b> <br> {{$proyecto->fecha_fin}}</li></center>
  
<div><center>
    <a href="{{ route('proyecto.index') }}" class="btn btn-success">Volver</a>
    </center></div>
</div>
</ul>

@endsection()