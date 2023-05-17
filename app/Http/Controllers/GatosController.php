<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Gatos;
class GatosController extends Controller
{
    public function index()
    {
        //
        $productos = Gatos::all();
        return $productos;
    }

    
    public function store(Request $request)
    {
        //
        $inputs = $request->input();
        $producto = Gatos::create($inputs);
        return response()->json([
            'data'=>$producto,
            'mensaje'=>"Producto creado con exito.",
        ]);
        // $respuesta = [];
        // $validar = $this->validar($request->all());
        // if(!is_array($validar)){
        //     Producto::create($request->all());
        //     array_push($respuesta,['status'=>'success']);
        //     return response()->json($respuesta);
        // }
        // else{
        //     return response()->json($validar);
        // }
        

    }

    
    public function show(string $id)
    {
        //
        $producto = Gatos::find($id);
        if(isset($producto)){
            return response()->json([
                    'data'=>$producto,
                    'mensaje'=>"Producto encontrado con exito.",
                ]);
            }
            else {
                return response()->json([
                    'error'=>true,
                    'mensaje'=>"No existe este producto.",
                ]);

            }
    }

    
    public function update(Request $request, string $id)
    {
        //
        $producto = Gatos::find($id);
        if(isset($producto)){
            
            $producto->nombre=$request->nombre;
            $producto->precio=$request->precio;
            $producto->descripcion=$request->descripcion;
            $producto->cantidad=$request->cantidad;
            if ($producto->save()){
                return response()->json([
                    'data'=>$producto,
                    'mensaje'=>"Producto actualizado con exito.",
                ]);
            }
        }
        else {
            return response()->json([
                'error'=>true,
                'mensaje'=>"No existe este producto.",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $producto = Gatos::find($id);
        if(isset($producto)){
            $producto->delete();
            return response()->json([
                'data'=>$producto,
                'mensaje'=>"Producto eliminado con exito.",
            ]);
        }
        else{
            return response()->json([
                'error'=>true,
                'mensaje'=>"No existe este producto.",
            ]);
        }
    }

    // funcion para validar el envio de la infromacion de la api
    public function validar($parametros){
        $respuesta = [];
        $validacion=Validator::make($parametros,
        [
            'folio'=>'requiered|max:255',
            'nombre'=>'required|max:200',
            'precio'=>'required|numeric|max:10',
            'descripcion'=>'required|max:200',
            'cantidad'=>'required|numeric|max:10'
        ]);
        if($validacion->fails()){
            array_push($respuesta,['status'=>'error']);
            array_push($respuesta,['errors'=>$validacion->errors()]);
            return $respuesta;
        }
        else{
            return true;
        }

    }
}
