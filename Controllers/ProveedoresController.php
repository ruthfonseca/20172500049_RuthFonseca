<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Proveedor;
use App\Models\Producto;


class ProveedoresController extends Controller
{


 


    public function index(){
        $proveedores = Proveedor::paginate(10);        
        return view('proveedores')->with('proveedores', $proveedores);
         }


    public function buscar(Request $request){
    $proveedores = Proveedor::where('nombre_p','like','%'.$request->bus.'%')->paginate(10);    
        return view('proveedores')->with('proveedores', $proveedores);
    }

         




         public function show($id){
            $proveedores = Proveedor::findOrFail($id);
            $productos = Producto::where('proveedor_p','=',$id)->get();                 
                 return view('proveedorver')->with('proveedores', $proveedores)->with('productos', $productos);
             }



                
     public function crear(){          
        return view('crearProveedor');
    }



    public function store(Request $request){    
             
      
        $nuevoProveedor = new Proveedor();
        $request->validate([
            'nombre'=>'required|unique:proveedors,nombre_p',
            'correo'=>'required|unique:proveedors,correo_p',
            'contacto'=>'required',
            'telefono'=>'required|numeric|unique:proveedors,telefono_p'
        ]);
        $nuevoProveedor->nombre_p = $request->nombre;
        $nuevoProveedor->nombre_del_c = $request->contacto;
        $nuevoProveedor->telefono_p = $request->telefono;
        $nuevoProveedor->correo_p = $request->correo;
        $creado = $nuevoProveedor->save();

        if($creado){

        return redirect()->route('proveedores.index')->with('mensaje','El proveedor fue registrado exitosamente');
        }else{
            return "hola";
        }           

    
    }





    public function edit($id){
        $proveedores = Proveedor::findOrFail($id);                 
             return view('editarProveedores')->with('proveedores', $proveedores);
         }





         public function update(Request $request, $id){
             
            $proveedores = Proveedor::findOrFail($id);     

            $request->validate([
                'nombre'=>'required',
                'correo'=>'required',
                'contacto'=>'required',
                'telefono'=>'required|numeric'
            ]);
            $proveedores->nombre_p = $request->nombre;
            $proveedores->correo_p = $request->correo;
            $proveedores->telefono_p = $request->telefono;
            $proveedores->nombre_del_c = $request->contacto;
            $creado = $proveedores->save();

         
            if($creado){
            return redirect()->route('proveedores.index')->with('mensaje','El proveedor fue modificado exitosamente');
            }else{
                return 'error';
            }           

             }

             public function destroy($id){

                Proveedor::destroy($id);   
                return redirect()->route('proveedores.index')->with('mensaje','El proveedor fue eliminado exitosamente');
                }


        
}
