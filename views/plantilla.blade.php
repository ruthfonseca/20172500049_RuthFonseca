<!DOCTYPE html>
<html lang="en">
    
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<title>@yield('titulo')</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-info bg-info">
            <a class="navbar-brand"><strong>El Popular</strong></a>
         
                <div class="navbar-nav">
                    <a class="nav-link " style="color:white" href="{{route('clientes.index')}}">Clientes</a>    
                    <a class="nav-link active" style="color:white" href="{{route('proveedores.index')}}">Proveedores y Productos</a>    
                    <a class="nav-link active" style="color:white" href="{{route('compras.index')}}">Factura</a>                 
                </div>
    </nav>

<div class="container">    
    @yield('content')
</div>

</body>
</html>