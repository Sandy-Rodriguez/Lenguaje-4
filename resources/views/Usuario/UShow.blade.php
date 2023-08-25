@extends('layout')

@section('titulo','Show')

@section('contenido')

<br>
<br>
<div class="container" style="max-width: 500px;" >
<div class="card" style="width: 30rem;">
  <div class="card-header">
   <center><b> Datos del Usuario</b></center>
  </div>
  <ul class="list-group list-group-flush">
  <center><li class="list-group-item"><b>Nombre:</b> <br> {{$usuario->nombre}}</li></center>
  <center> <li class="list-group-item"><b>Correo Electronico:</b> <br> {{$usuario->correo_electronico}}</li></center>

  
<div><center>
    <a href="{{ route('usuario.index') }}" class="btn btn-success">Volver</a>
    </center></div>
</div>
</ul>

@endsection()