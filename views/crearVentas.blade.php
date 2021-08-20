@extends('plantilla')


@section('titulo')
Crear Venta
@endsection

@section('content')


&nbsp;

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li> {{$error}}</li>
        @endforeach
    </ul> 
 </div>
@endif

<form method="post" action="{{route('compras.guardar')}}">
    @csrf

    <label for="cliente" class="form-label">cliente</label>
<select class="form-select"  id="cliente" name="cliente">
  @foreach($clientes as $c)
  <option value="{{$c->nombre_c}}">{{$c->nombre_c}}</option>
  @endforeach
</select>

<label for="productos" class="form-label">productos</label>
<select class="form-select"  id="productos" size="3" name="productos[]" multiple  >
  @foreach($productos as $p)
  <option value="{{$p->nombre_p}}">{{$p->nombre_p}}</option>
  @endforeach
</select>



<br>
<button type="submit" class="btn btn-info"> Guardar Factura </button>

</form>


@endsection