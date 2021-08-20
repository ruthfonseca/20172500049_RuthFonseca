<?php

namespace App\Http\Controllers;

use App\Models\DatalleFactura;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class DatalleFacturaController extends Controller
{
  
    public function show($id)
    {
        
       $detalles =  DatalleFactura::where('id_venta','=',$id)->get();
       $venta = Venta::where('id','=',$id)->get();
    return  view('ventasver')->with('detalles',$detalles)->with('venta',$venta);
    }


    public function destroy(Request $request){
        DatalleFactura::destroy($request->id);   

        return redirect()->route('facturas.index',['id'=> $request->id_factura]);   
    }

    

}
