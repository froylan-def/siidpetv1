<?php

namespace App\Http\Controllers;

use App\Models\OrdenAprencion;
use Illuminate\Http\Request;

class ordenAprencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orden_aprencion = OrdenAprencion::all();
        return response( $orden_aprencion );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'hora'=> 'required',
            'observaciones' => 'required'
        ]);

        $orden_aprencion = OrdenAprencion::create( $request->all() );

        // Puedes realizar otras acciones después de la creación, como redireccionar o devolver una respuesta JSON
        return response()->json(['mensaje' => 'Datos guardados con éxito', 'orden_aprencion' => $orden_aprencion ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Se obtiene el registro de la base de datos
        $orden_aprencion = OrdenAprencion::find($id);

        //Compara si la consulta encontró datos
        if (! $orden_aprencion ) {
            return response()->json(['mensaje' => 'Datos de la orden de aprencion no encontrados'], 404);
        }

        //Lo retorna con un código 201
        return response()->json(['orden_aprencion' => $orden_aprencion ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $orden_aprencion = OrdenAprencion::find($id);

        // Verifica si el usuario existe
        if (! $orden_aprencion ) {
            return response()->json(['mensaje' => 'Datos de la orden de aprencion no encontrados'], 404);
        }

        // Actualiza los datos con los nuevos datos proporcionados
        $orden_aprencion->update($request->all());

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
        //
        // Buscar el usuario por su ID
        $OrdenAprencion = OrdenAprencion::find($id);

        // Verificar si el usuario existe
        if ( $OrdenAprencion ) {
            // Eliminar el usuario
            $OrdenAprencion->delete();
            return response()->json(['mensaje' => 'Datos de la orden de aprencion eliminados correctamente'], 201);
        } else {
            return response()->json(['mensaje' => 'No se ha encontrado el dato'], 201);
        }
    }
}
