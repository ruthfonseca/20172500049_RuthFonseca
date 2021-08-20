@extends('plantilla')


@section('titulo')
Crear Proveedor
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

<form method="post" action="{{route('proveedores.guardar')}}">
    @csrf
<br>
<div class="mb-3">
  <label for="nombre" class="form-label">Nombre</label>
  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Compañia">
</div>

<div class="mb-3">
  <label for="correo" class="form-label">Correo</label>
  <input type="text" class="form-control" id="correo" name="correo" placeholder="compania@gmail.com">
</div>

<div class="mb-3">
  <label for="telefono" class="form-label">Telefono</label>
  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="98898778">
</div>

<div class="mb-3">
  <label for="contacto" class="form-label">Nombre del contacto</label>
  <input type="text" class="form-control" id="contacto" name="contacto" placeholder="Jose Perez">
</div>


<button type="submit" class="btn btn-info"> Guardar </button>
<button type="reset" class="btn btn-danger"> Reestablecer </button>
<a type="button" class="btn btn-primary" href="{{route('proveedores.index')}}">Cancelar</a>  

</form>


@endsection