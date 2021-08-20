@extends('plantilla')


@section('titulo')
Crear Cliente
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

<br>
<form method="post" action="{{route('cliente.guardar')}}">
    @csrf

<div class="mb-3">
  <label for="nombre" class="form-label">Nombre Cliente </label>
  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ruth Reconco">
</div>


<div class="mb-3">
  <label for="telefono" class="form-label">Telefono Cliente</label>
  <input type="number" class="form-control" id="telefono" name="telefono" placeholder="98764567">
</div>


<a type="button" class="btn btn-primary" href="{{route('clientes.index')}}">Cancelar</a>  
<button type="reset" class="btn btn-danger"> Limpiar campos </button>
<button type="submit" class="btn btn-info"> Crear </button>

</form>


@endsection