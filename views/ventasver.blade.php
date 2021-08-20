@extends('plantilla')

@section('titulo')
Ver Factura
@endsection

@section('content')


<h3>Detalles factura # {{$venta[0]->id}}  del cliente {{$venta[0]->cliente}}</h3>
<h5>De la fecha: {{$venta[0]->fecha}}</h5>

<table class="table table-info">
  <thead>
    <tr>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
@foreach($detalles as $d)
    <tr>  
      <td scope="col">{{$d->productos}}</td>
      <td scope="col">{{$d->precio}}</td>    <td scope="col" > 

        <form method="post" action="{{route('facturas.borrar')}}" 
           onclick="return confirm('esta seguro de realizar esta accion')">
        @csrf
        @method('post')
        <input name="id_factura" value="{{$venta[0]->id}}" hidden>
        <input name="id" value="{{$d->id}}" hidden>
        <input type="submit" value="Eliminar" class="btn btn-danger">
        </form>
    </td> 
  </tr>
@endforeach
  </tbody>
</table>

<a type="button" class="btn btn-primary" href="{{route('compras.index')}}">Volver</a>  

@endsection