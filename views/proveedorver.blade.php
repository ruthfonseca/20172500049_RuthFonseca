@extends('plantilla')

@section('titulo')
Ver Proveedor
@endsection

@section('content')



<h3>Productos del proveedor {{$proveedores->nombre_p}}</h3>


<table class="table table-info">
  <thead>
    <tr>  
      <th scope="col"><a type="button" class="btn btn-primary" href="{{route('productos.nuevo',['id'=> $proveedores->id] )}}" >Nuevo Producto</a> </th>
      <th scope="col">Nombre</th>
      <th scope="col">Categoria</th>
      <th scope="col">Precio compra</th>
      <th scope="col">Precio venta</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>

  @forelse($productos as $prod)
    <tr>  
      <td scope="col">{{$prod->id}}</td>
      <td scope="col">{{$prod->nombre_p}}</td>
      <td scope="col">{{$prod->categoria_p}}</td>
      <td scope="col">{{$prod->precio_c}}</td>
      <td scope="col">{{$prod->precio_v}}</td>
      <td scope="col"><a type="button" class="btn btn-warning" href="{{route('productos.edit',['id'=> $prod->id] )}}" >Editar</a></td>
      <td scope="col">
      <form method="post" action="{{route('productos.borrar',['id'=> $prod->id] )}}"  onclick="return confirm('¿Desea eliminar este producto?')">
      @csrf
      @method('post')
     
      <input value="{{$proveedores->id}}" name="id_proveedor" hidden>
      <input type="submit" value="Eliminar" class="btn btn-danger">
      </form>
      </td>
    </tr>
    @empty
    <tr>  
<td colspan='7'>No hay productospara este proveedor</td>
    </tr>

    @endforelse





   

   

   
  </tbody>
</table>

<a type="button" class="btn btn-primary" href="{{route('proveedores.index')}}">Volver</a>  


@endsection