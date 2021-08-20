<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
   
    
    
              
   public function nuevo($id){ 
    $proveedor = Proveedor::findOrFail($id);           
      return view('crearProducto')->with('id', $id)->with('proveedor', $proveedor);
  }



  public function store(Request $request){          
      $nuevoProducto = new Producto();
      $request->validate([
        'nombre_p'=>'required|unique:productos,nombre_p',
        'categoria_p'=>'required',
        'precio_c'=>'required|numeric|min:0|max:999999',
        'precio_v'=>'required|numeric|min:0|max:999999',
        'id_proveedor'=>'required'
    ]);
      $nuevoProducto->nombre_p = $request->nombre_p;
      $nuevoProducto->categoria_p = $request->categoria_p;
      $nuevoProducto->precio_c = $request->precio_c;
      $nuevoProducto->precio_v = $request->precio_v;
      $nuevoProducto->proveedor_p = $request->id_proveedor;
      $creado = $nuevoProducto->save();

      if($creado){

      return redirect()->route('proveedores.mostrar',['id'=> $request->id_proveedor])->with('mensaje','El producto fue registrado exitosamente');
      }else{
          return "error";
      }          
  }





  public function edit($id){
      $productos = Producto::findOrFail($id);                 
           return view('editarProductos')->with('productos', $productos);
       }





       public function update(Request $request, $id){
           
          $productos = Producto::findOrFail($id);     

          $request->validate([
              'nombre_p'=>'required',
              'categoria_p'=>'required',
              'precio_c'=>'required|numeric',
              'precio_v'=>'required|numeric',
          ]);

            $productos->nombre_p = $request->nombre_p;
            $productos->categoria_p = $request->categoria_p;
            $productos->precio_c = $request->precio_c;
            $productos->precio_v = $request->precio_v;
          $creado = $productos->save();

       
          if($creado){
            return redirect()->route('proveedores.mostrar',['id'=> $request->id_proveedor])->with('mensaje','El producto fue registrado exitosamente');
        }else{
              return 'error';
          }           

           }

           public function destroy(Request $request,$id){
            Producto::destroy($id);   
            return redirect()->route('proveedores.mostrar',['id'=> $request->id_proveedor])->with('mensaje','El producto fue registrado exitosamente');
        }
}
