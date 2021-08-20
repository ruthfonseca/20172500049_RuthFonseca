@extends('plantilla')

@section('titulo')
 Clientes
@endsection

@section('content')

@if(session('mensaje'))
 <div class="alert alert-success">
    {{session('mensaje')}}
 </div>
@endif


<br>

<form method="Post" action="{{route('clientes.buscar')}}">
  @csrf
   <label for="bus" class="form-label">Buscar</label>
<input name="bus" id="bus" >
</form>

<br>


<table class="table table-bordered table-info">
  <thead>
    <tr>
      <th scope="col"><a type="button" class="btn btn-primary" href="{{route('clientes.create')}}">Crear Cliente </a> </th>
      <th scope="col">Nombre Cliente </th>
      <th scope="col">Teléfono Cliente</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>

@forelse($clientes as $cliente)
<tr>
      <td scope="col">{{$cliente->id}}</td>
    
      <td scope="col">{{$cliente->nombre_c}}</td>
      <td scope="col">{{$cliente->telefono_c}}</td>
      <td scope="col">  <a type="button" class="btn btn-warning" href="{{route('clientes.edit',['id'=> $cliente->id] )}}" >Editar</a>  </td>
     <td scope="col">
        <form method="post" action="{{route('clientes.borrar',['id'=> $cliente->id] )}}"
            onclick="return confirm('¿Está seguro que quiere realizar esta acción?')">
        @csrf
        @method('delete')
        <input type="submit" value="Eliminar" class="btn btn-danger">
        </form>
    </td>
    
    </tr>
@empty
<tr >
<td colspan='5'>No hay clientes</td>
</tr>
@endforelse   
  </tbody>
</table>

{{$clientes->links()}}

@endsection