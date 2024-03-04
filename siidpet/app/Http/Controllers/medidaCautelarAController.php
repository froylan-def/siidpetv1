<?php

namespace App\Http\Controllers;

use App\Models\MedidaCautelarA;
use Illuminate\Http\Request;

class medidaCautelarAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medidaCautelarA = MedidaCautelarA::all();
        return response( $medidaCautelarA );
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
            'nombre' => 'required',
            'id_medida_cautelar'=> 'required',
        ]);

        $medidaCautelarA = MedidaCautelarA::create( $request->all() );

        // Puedes realizar otras acciones después de la creación, como redireccionar o devolver una respuesta JSON
        return response()->json(['mensaje' => 'Datos guardados con éxito', 'medida_cautelar_a' => $medidaCautelarA ], 201);
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
        $medidaCautelarA = MedidaCautelarA::find($id);

        //Compara si la consulta encontró datos
        if (! $medidaCautelarA ) {
            return response()->json(['mensaje' => 'Datos de la medida cautelar a no encontrados'], 404);
        }

        //Lo retorna con un código 201
        return response()->json(['medida_cautelar_a' => $medidaCautelarA ], 201);
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
        $medidaCautelarA = MedidaCautelarA::find($id);

        // Verifica si el usuario existe
        if (! $medidaCautelarA ) {
            return response()->json(['mensaje' => 'Datos de la medida cautelar a no encontrados'], 404);
        }

        // Actualiza los datos con los nuevos datos proporcionados
        $medidaCautelarA->update($request->all());

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
        $medidaCautelarA = MedidaCautelarA::find($id);

        // Verificar si el usuario existe
        if ( $medidaCautelarA ) {
            // Eliminar el usuario
            $medidaCautelarA->delete();
            return response()->json(['mensaje' => 'Datos del imputado eliminados correctamente'], 201);
        } else {
            return response()->json(['mensaje' => 'No se ha encontrado el dato'], 201);
        }
    }
}
