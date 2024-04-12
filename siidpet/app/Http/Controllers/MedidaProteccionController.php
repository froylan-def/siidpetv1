<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedidaProteccion;

class MedidaProteccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $MedidaProteccion = MedidaProteccion::orderBy('activo', 'DESC')->get();
        return response($MedidaProteccion);
        //return csrf_token(); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //return csrf_token(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        //
        //
        $request->validate([
            'nombre' => 'required',
            'activo' => 'required',
        ]);

        $MedidaProteccion = MedidaProteccion::create( $request->all() );

        // Puedes realizar otras acciones después de la creación, como redireccionar o devolver una respuesta JSON
        return response()->json(['mensaje' => 'Objeto creado con éxito', 'objeto' => $MedidaProteccion ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $MedidaProteccion = MedidaProteccion::where('id', $id)->where('activo', 1);

        if (!$MedidaProteccion) {
            return response()->json(['mensaje' => 'Ugi no encontrado'], 404);
        }

        return response()->json(['ugi' => $MedidaProteccion], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $MedidaProteccion = MedidaProteccion::find($id);

        if ($MedidaProteccion) {
            // Eliminar el usuario
            //$ugi->delete();
        
      
            $MedidaProteccion->activo = 1;
            $MedidaProteccion->save();
        
            return response()->json(['mensaje' => 'Ugi activado correctamente'], 201);
        } else {
            return response()->json(['mensaje' => 'No se ha encontrado el Ugi correspondiente'], 201);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Encontramos el dato con el id
        $MedidaProteccion = MedidaProteccion::find($id);

        // Verifica si el usuario existe
        if (!$MedidaProteccion) {
            return response()->json(['mensaje' => 'Ugi no encontrado'], 404);
        }

        // Actualiza los datos con los nuevos datos proporcionados
        $MedidaProteccion->update($request->all());

        // Puedes devolver una respuesta JSON, un mensaje de éxito, etc.
        return response()->json(['mensaje' => 'Datos actualizados con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // return response()->json(['mensaje' => 'ALGO DE RESPUESTA EN DELETE'], 201);
        // Buscar el usuario por su ID
        $MedidaProteccion = MedidaProteccion::find($id);

        // Verificar si el usuario existe
        if ($MedidaProteccion) {
            // Eliminar el usuario
            //$ugi->delete();
        
      
            $MedidaProteccion->activo = 0;
            $MedidaProteccion->save();
        
            return response()->json(['mensaje' => 'Ugi eliminado correctamente'], 201);
        } else {
            return response()->json(['mensaje' => 'No se ha encontrado el Ugi correspondiente'], 201);
        }
    }


    public function activar()
    {
        return response()->json(['mensaje' => 'Hola mundo'], 201);
        /*
         // return response()->json(['mensaje' => 'ALGO DE RESPUESTA EN DELETE'], 201);
        // Buscar el usuario por su ID
        $ugi = Ugi::find($id);

        // Verificar si el usuario existe
        if ($ugi) {
            // Eliminar el usuario
            //$ugi->delete();
            $ugi->activo = 1;
            $ugi->save();
        
            return response()->json(['mensaje' => 'Ugi activado correctamente'], 201);
        } else {
            return response()->json(['mensaje' => 'No se ha encontrado el Ugi correspondiente'], 201);
        }*/
    }
}
