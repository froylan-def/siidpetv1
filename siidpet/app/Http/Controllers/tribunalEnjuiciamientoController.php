<?php

namespace App\Http\Controllers;

use App\Models\TribunalEnjuiciamiento;
use Illuminate\Http\Request;

class tribunalEnjuiciamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Se obtienen todos los objetos de la tabla flagrancia
        $tribunalEnjuiciamiento = TribunalEnjuiciamiento::all();
        return response( $tribunalEnjuiciamiento );
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
            'nombre' => 'required',
            'id_municipio' => 'required',
        ]);

        //Se usa la función create() con el request que guarda el objeto
        $tribunalEnjuiciamiento = TribunalEnjuiciamiento::create( $request->all() );

        // Puedes realizar otras acciones después de la creación, como redireccionar o devolver una respuesta JSON
        return response()->json(['mensaje' => 'Datos guardados con éxito', 'tribunal_enjuiciamiento' => $tribunalEnjuiciamiento ], 201);
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
        $tribunalEnjuiciamiento = TribunalEnjuiciamiento::find($id);

        //Compara si la consulta encontró datos
        if (! $tribunalEnjuiciamiento ) {
            return response()->json(['mensaje' => 'Datos del tribunal de enjuiciamiento no encontrados'], 404);
        }

        //Lo retorna con un código 201
        return response()->json(['tribunal_enjuiciamiento' => $tribunalEnjuiciamiento], 201);
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
        $tribunalEnjuiciamiento = TribunalEnjuiciamiento::find($id);

        // Verifica si el usuario existe
        if (! $tribunalEnjuiciamiento ) {
            return response()->json(['mensaje' => 'Datos del tribunal de enjuiciamiento no encontrados'], 404);
        }

        // Actualiza los datos con los nuevos datos proporcionados
        $tribunalEnjuiciamiento->update($request->all());

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
        $tribunalEnjuiciamiento = TribunalEnjuiciamiento::find($id);

        // Verificar si el usuario existe
        if ( $tribunalEnjuiciamiento ) {
            // Eliminar el usuario
            $tribunalEnjuiciamiento->delete();
            return response()->json(['mensaje' => 'Datos del tribunal de enjuiciamiento eliminados correctamente'], 201);
        } else {
            return response()->json(['mensaje' => 'No se ha encontrado el dato'], 201);
        }
    }
}
