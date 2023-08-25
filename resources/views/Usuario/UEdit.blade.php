@extends('layout')

@section('titulo','Edit')

@section('contenido')

<br><br>
<form  method="POST" action="{{route('usuario.update',[$usuarios->id])}}" class0="needs-validation">
@method("PUT")
@csrf

  <h4 class="card-header"><center><b><ul>Editar datos del usuario</ul></b></center></h4>
    <div class="card">
    <div class="card-body">

    <div class="card-title"><center><b>Nombre:</b>
    <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
    name="nombre"  id="nombre" placeholder="Ingrese el nuevo nombre" value="{{old('nombre') ?? $usuarios->nombre}}">
    
    @error('nombre')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>

    <div class="card-title"><center><b>Correo electronico:</b>
    <input type="text" class="form-control @error('correo_electronico') is-invalid @enderror" 
    name="correo_electronico"  id="correo_electronico" placeholder="Ingrese el nuevo correo electronico" value="{{old('correo_electronico') ?? $usuarios->correo_electronico}}">

    @error('correo_electronico')
        <div class ="invalid-feedback">{{$message}}</div>
    @enderror
    </div><br>

    
    <div><center>
    <input type="submit" class="btn btn-primary" value="Editar">
    <a href="{{ route('usuario.index') }}" class="btn btn-success">Volver</a>
    </center></div>

   </div>
  </div>
</form>
@endsection()