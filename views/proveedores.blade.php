@extends('plantilla')


@section('titulo')
Proveedores
@endsection


@section('content')

@if(session('mensaje'))
 <div class="alert alert-success">
    {{session('mensaje')}}
 </div>
@endif





<br>
<form method="Post" action="{{route('proveedores.buscar')}}">
  @csrf
   <label for="bus" class="form-label">Buscar</label>
<input name="bus" id="bus" >
</form>
<br>

<table class="table table-bordered table-info">
  <thead>
    <tr>
      <th scope="col"><a type="button" class="btn btn-primary" href="{{route('proveedor.crear')}}">Crear proveedor</a> </th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Nombre del contacto</th>
      <th scope="col">Productos</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>

@forelse($proveedores as $proveedor)
<tr>
      <td scope="col">{{$proveedor->id}}</td>
    
      <td scope="col">{{$proveedor->nombre_p}}</td>
      <td scope="col">{{$proveedor->correo_p}}</td>
      <td scope="col">{{$proveedor->telefono_p}}</td>
      <td scope="col">{{$proveedor->nombre_del_c}}</td>
      <td scope="col"> <a type="button" class="btn btn-warning" href="{{route('proveedores.mostrar',['id'=> $proveedor->id] )}}" >Ver y Añadir</a></td>
     


      <td scope="col">  <a type="button" class="btn btn-warning" href="{{route('proveedores.edit',['id'=> $proveedor->id] )}}" >Editar</a>  </td>
     <td scope="col" > 
          <form method="post" action="{{route('proveedores.borrar',['id'=> $proveedor->id] )}}" 
      onclick="return confirm('¿Está seguro que quiere realizar esta acción?')">
      @csrf
      @method('delete')
      <input type="submit" value="Eliminar" class="btn btn-danger">
      </form>
    </td>
    
    </tr>
@empty
<tr >
<td colspan='8'>No hay proveedores</td>
</tr>
@endforelse
   
  </tbody>
</table>

{{$proveedores->links()}}

@endsection