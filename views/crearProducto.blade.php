@extends('plantilla')


@section('titulo')
Crear Producto
@endsection

@section('content')

<h1>Nuevo Producto de {{$proveedor->nombre_p}}</h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li> {{$error}}</li>
        @endforeach
    </ul> 
 </div>
@endif

<form method="post" action="{{route('productos.guardar')}}">
    @csrf

<div class="mb-3">
  <label for="nombre_p" class="form-label">Nombre </label>
  <input type="text" maxlength="50"  class="form-control" id="nombre_p" name="nombre_p" placeholder="nombre del producto">
</div>


<div class="mb-3">
  <label for="categoria_p" class="form-label">Categoria</label>
  <input type="text" maxlength="50"  class="form-control" id="categoria_p" name="categoria_p" placeholder="categoria del producto">
</div>

<div class="mb-3">
  <label for="precio_c" class="form-label">Precio de Compra</label>
  <input type="number"  class="form-control" id="precio_c" name="precio_c" placeholder="precio del proveedor">
</div>

<div class="mb-3">
  <label for="precio_v" class="form-label">Precio de Venta</label>
  <input type="number"  class="form-control" id="precio_v" name="precio_v" placeholder="precio al consumidor">
<input type="number"  class="form-control" id="id_proveedor" name="id_proveedor" value="{{$id}}" hidden>
  
</div>




<button type="submit" class="btn btn-info"> Guardar </button>
<button type="reset" class="btn btn-danger"> Reestablecer </button>

</form>


@endsection