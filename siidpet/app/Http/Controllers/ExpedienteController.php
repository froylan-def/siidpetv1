<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use Illuminate\Http\Request;

class expedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Se obtienen todos los objetos de la tabla
        $expediente = Expediente::with('ugi', 'defensor', 'entrevista', 'imputado', 'delito', 'victima', 'flagrancia', 'asignacionmedidas', 'acuerdosedeministerial', 'juez', 'defensoraudiencia', 'acuerdoreparatorio', 'delitoproceso', 'investigacioncomplementaria', 'prorrogaplazoinvestigacioncomplementaria', 'medidacautelar', 'suspencioncondicionalproceso', 'procedimientoabreviado', 'tribunalenjuiciamiento', 'conclusion', 'impugnacion', 'ordenaprencion')->get();
        return response( $expediente );
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
            'foja' => 'required',
            'id_ugi' => 'required',
            'nuc' => 'required',
        ]);
        
        // Se usa la función create() con el request que guarda el objeto
        $expediente = Expediente::create( $request->all() );

        // Puedes realizar otras acciones después de la creación, como redireccionar o devolver una respuesta JSON
        return response()->json(['mensaje' => 'Datos guardados con éxito', 'expediente' => $expediente ], 201);
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
        $expediente = Expediente::with('ugi', 'defensor', 'entrevista', 'imputado', 'delito', 'victima', 'flagrancia', 'asignacionmedidas', 'acuerdosedeministerial', 'juez', 'defensoraudiencia', 'acuerdoreparatorio', 'delitoproceso', 'investigacioncomplementaria', 'prorrogaplazoinvestigacioncomplementaria', 'medidacautelar', 'suspencioncondicionalproceso', 'procedimientoabreviado', 'tribunalenjuiciamiento', 'conclusion', 'impugnacion', 'ordenaprencion')->find($id);

        //Compara si la consulta encontró datos
        if (! $expediente ) {
            return response()->json(['mensaje' => 'Datos del expediente no encontrados'], 404);
        }

        //Lo retorna con un código 201
        return response()->json(['expediente' => $expediente], 201);
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
        $expediente = Expediente::find($id);

        // Verifica si el usuario existe
        if (! $expediente ) {
            return response()->json(['mensaje' => 'Datos del expediente no encontrados'], 404);
        }

        // Actualiza los datos con los nuevos datos proporcionados
        $expediente->update($request->all());

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
        $expediente = Expediente::find($id);

        // Verificar si el usuario existe
        if ( $expediente ) {
            // Eliminar el usuario
            $expediente->delete();
            return response()->json(['mensaje' => 'Datos del expediente eliminados correctamente'], 201);
        } else {
            return response()->json(['mensaje' => 'No se ha encontrado el dato'], 201);
        }
    }
}
