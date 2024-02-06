<?php

namespace App\Http\Controllers;

use App\Models\Detencion;
use Illuminate\Http\Request;

class DetencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $detencion = Detencion::all();
        return response( $detencion );
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
        //Se validan los datos a traves de laravel
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'resultado_examen' => 'required',
        ]);

        //Se usa la función create() con el request que guarda el objeto
        $detencion = Detencion::create( $request->all() );

        // Puedes realizar otras acciones después de la creación, como redireccionar o devolver una respuesta JSON
        return response()->json(['mensaje' => 'Datos guardados con éxito', 'detencion' => $detencion ], 201);
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
        $detencion = Detencion::find($id);

        //Compara si la consulta encontró datos
        if (! $detencion ) {
            return response()->json(['mensaje' => 'Datos de la conclusion no encontrado'], 404);
        }

        //Lo retorna con un código 201
        return response()->json(['detencion' => $detencion], 201);
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
        $detencion = Detencion::find($id);

        // Verifica si el usuario existe
        if (! $detencion ) {
            return response()->json(['mensaje' => 'Datos de la detencion no encontrados'], 404);
        }

        // Actualiza los datos con los nuevos datos proporcionados
        $detencion->update($request->all());

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
        // Buscar el usuario por su ID
        $detencion = Detencion::find($id);

        // Verificar si el usuario existe
        if ( $detencion ) {
            // Eliminar el usuario
            $detencion->delete();
            return response()->json(['mensaje' => 'Datos de la detencion eliminados correctamente'], 201);
        } else {
            return response()->json(['mensaje' => 'No se ha encontrado el dato'], 201);
        }
    }
}
