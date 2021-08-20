@extends('plantilla')


@section('titulo')
Ventas
@endsection


@section('content')

@if(session('mensaje'))
 <div class="alert alert-success">
    {{session('mensaje')}}
 </div>
@endif



<br>

<table class="table table-bordered table-info">
  <thead>
    <tr>
      <th scope="col"><a type="button" class="btn btn-primary" href="{{route('compras.crear')}}">Crear Factura</a> </th>
      <th scope="col">Fecha</th>
      <th scope="col">Nombre del cliente</th>
      <th scope="col">Ver</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>

@forelse($ventas as $venta)
<tr>
      <td scope="col">{{$venta->id}}</td>
      <td scope="col">{{$venta->fecha}}</td>    
      <td scope="col">{{$venta->cliente}}</td>
      <td scope="col">   <a type="button" class="btn btn-info" href="{{route('facturas.index',['id'=> $venta->id] )}}" >Ver</a> </td>

     <td scope="col" > 
        <form method="post" action="{{route('compras.borrar',['id'=> $venta->id] )}}"  onclick="return confirm('desea eliminar esta venta?')">
        @csrf
        @method('delete')
        <input type="submit" value="Eliminar" class="btn btn-danger">
        </form>
    </td>
    
    </tr>
@empty
<tr >
<td colspan='7'>No hay ventas con esta coincidencia</td>
</tr>
@endforelse
   
  </tbody>
</table>

{{$ventas->links()}}

@endsection