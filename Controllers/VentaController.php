<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\ProductosVenta;
use App\Models\DatalleFactura;
use Illuminate\Http\Request;
use Carbon\Carbon;
class VentaController extends Controller
{
    public function index(Request $request){
        $ventas = Venta::where('created_at','like','%'.$request->buscar.'%')->paginate(10);       
        return view('ventas')->with('ventas', $ventas);
   }
     
   public function crear(){        
       $clientes =  Cliente::all();   
       $productos = Producto::all();
      return view('crearVentas')->with('clientes', $clientes)->with('productos', $productos);
  }



  public function store(Request $request){      
  
    $request->validate([
        'cliente'=>'required',
        'productos'=>'required'
    ]);  


    $nuevoVenta = new Venta();
    $nuevoVenta->cliente = $request->cliente;
    $nuevoVenta->fecha = Carbon::now();
    $creado = $nuevoVenta->save();

    $productos = $request->input('productos'); 
    $idv = Venta::latest('id')->first();

    foreach ($productos as $row){
        
        $productosventa = new DatalleFactura();  
        $input['producto'] = $row;
        $productosventa->productos =  $input['producto'];
        $pre= Producto::where('nombre_p','=',$input['producto'])->get();
        $productosventa->precio =  $pre[0]->precio_v;
        $productosventa->id_venta =  $idv->id;
        $productosventa->save();
    }
        return redirect()->route('compras.index');    
  }




  public function destroy($id){
    Venta::destroy($id);   
      return redirect()->route('compras.index')->with('mensaje','La venta fue eliminada exitosamente');
}
        
}
