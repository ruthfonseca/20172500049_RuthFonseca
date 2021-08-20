<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
  
    public function index(){
         $clientes = Cliente::paginate(10);       
         return view('clientes')->with('clientes', $clientes);
    }

    public function buscar(Request $request){
        $clientes = Cliente::where('nombre_c','like','%'.$request->bus.'%')->paginate(10);       
        return view('clientes')->with('clientes', $clientes);
   }

               
    public function create(){             
       return view('crearCliente');
   }



   public function store(Request $request){      
   
       $nuevoCliente = new Cliente();
       
    $request->validate([
        'nombre'=>'required|unique:clientes,nombre_c',
        'telefono'=>'required|numeric|unique:clientes,telefono_c'
    ]);  

       $nuevoCliente->nombre_c = $request->nombre;
       $nuevoCliente->telefono_c = $request->telefono;
       $creado = $nuevoCliente->save();

       if($creado){

       return redirect()->route('clientes.index')->with('mensaje','Se creó el cliente correctamente');
       }else{
           return "error";
       }          
   }





   public function edit($id){
       $clientes = Cliente::findOrFail($id);                 
            return view('editarClientes')->with('clientes', $clientes);
        }





        public function update(Request $request, $id){
            
           $cliente = Cliente::findOrFail($id);     

           $request->validate([
               'nombre'=>'required',
               'telefono'=>'required|numeric'
           ]);
           $cliente->nombre_c = $request->nombre;
           $cliente->telefono_c = $request->telefono;
           $creado = $cliente->save();

        
           if($creado){
           return redirect()->route('clientes.index')->with('mensaje','Se actualizó el cliente correctamente');
           }else{
               return 'error';
           }           

            }

            public function destroy($id){

               Cliente::destroy($id);   
               return redirect()->route('clientes.index')->with('mensaje','Se borró el cliente correctamente');
               }
}
