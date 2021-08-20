@extends('plantilla')


@section('titulo')
Editar Proveedor
@endsection

@section('content')


@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li> {{$error}}</li>
        @endforeach
    </ul> 
 </div>
@endif

<form method="post" action="{{route('proveedores.update',['id'=>$proveedores->id])}}">

    @csrf
<br>
<div class="mb-3">
  <label for="nombre" class="form-label">Nombre</label>
  <input type="text" value="{{$proveedores->nombre_p}}" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre">
</div>

<div class="mb-3">
  <label for="dia" class="form-label">Correo</label>
  <input type="text" value="{{$proveedores->correo_p}}" class="form-control" id="correo" name="correo" placeholder="Escriba el dia de entrega">
</div>

<div class="mb-3">
  <label for="telefono" class="form-label">Teléfono</label>
  <input type="number" value="{{$proveedores->telefono_p}}" class="form-control" id="telefono" name="telefono" placeholder="Escriba el telefono">
</div>

<div class="mb-3">
  <label for="contacto" class="form-label">Nombre del contacto</label>
  <input type="text" value="{{$proveedores->nombre_del_c}}"  class="form-control" id="contacto" name="contacto" placeholder="Escriba el nombre del contacto">
</div>





<button type="submit" class="btn btn-info"> Cambiar </button>
<a type="button" class="btn btn-primary" href="{{route('proveedores.index')}}">Cancelar</a>  

</form>


@endsection