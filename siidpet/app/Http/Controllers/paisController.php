<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;

class paisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paises = Pais::all();
        return response($paises);
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
        //
        $request->validate([
            'nombre' => 'required',
        ]);

        $pais = Pais::create( $request->all() );

        // Puedes realizar otras acciones después de la creación, como redireccionar o devolver una respuesta JSON
        return response()->json(['mensaje' => 'Pais creado con éxito', 'objeto' => $pais ], 201);
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
        $pais = Pais::find($id);

        if (! $pais ) {
            return response()->json(['mensaje' => 'Pais no encontrado'], 404);
        }

        return response()->json(['pais' => $pais], 201);
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
        //
        // Encontramos el dato con el id
        $pais = Pais::find($id);

        // Verifica si el usuario existe
        if (! $pais ) {
            return response()->json(['mensaje' => 'Pais no encontrado'], 404);
        }

        // Actualiza los datos con los nuevos datos proporcionados
        $pais->update($request->all());

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
        $pais = Pais::find($id);

        // Verificar si el usuario existe
        if ( $pais ) {
            // Eliminar el usuario
            $pais->delete();
            return response()->json(['mensaje' => 'Pais eliminado correctamente'], 201);
        } else {
            return response()->json(['mensaje' => 'No se ha encontrado el pais correspondiente'], 201);
        }
    }
}
