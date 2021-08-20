@extends('plantilla')


@section('titulo')
Editar Cliente
@endsection

@section('content')

<h5>Editar Cliente</h5>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li> {{$error}}</li>
        @endforeach
    </ul> 
 </div>
@endif

<form method="post" action="{{route('clientes.update',['id'=>$clientes->id])}}">

    @csrf

<div class="mb-3">
  <label for="nombre" class="form-label">Nombre del proveedor</label>
  <input type="text" value="{{$clientes->nombre_c}}" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre del cliente" required>
</div>


<div class="mb-3">
  <label for="telefono" class="form-label">Teléfono</label>
  <input type="number"  value="{{$clientes->telefono_c}}" class="form-control" id="telefono" name="telefono" placeholder="Escriba el telefono del cliente" required>
</div>




<button type="submit" class="btn btn-info"> Actualizar </button>
<a type="button" class="btn btn-primary" href="{{route('clientes.index')}}">Cancelar</a>  

</form>


@endsection