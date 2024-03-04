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
        $expediente = Expediente::all();
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
            'id_defensor' => 'required',
            'id_entrevista' => 'required',
            'nuc' => 'required',
            'id_imputado' => 'required',
            'id_delito' => 'required',
            'id_victima' => 'required',
            'id_flagrancia' => 'required',
            'determinacion_mp' => 'required',
            'id_asignacion_medidas' => 'required',
            'id_acuerdo_sede_ministerial' => 'required',
            'carpeta_procesal' => 'required',
            'audiencia_inicial' => 'required',
            'id_juez_control' => 'required',
            'id_defensor_audiencia' => 'required',
            'cita_mecanismos' => 'required',
            'id_acuerdo_reparatorio' => 'required',
            'fecha_formulacion_imputacion' => 'required',
            'fecha_vinculacion_proceso' => 'required',
            'id_delito_proceso' => 'required',
            'id_investigacion_complementaria' => 'required',
            'id_prorroga_plazo' => 'required',
            'id_medida_cautelar' => 'required',
            'audiencia_intermedia' => 'required',
            'id_suspencion_condicional_proceso' => 'required',
            'id_procedimiento_abreviado' => 'required',
            'juicio' => 'required',
            'id_tribunal_enjuiciamiento' => 'required',
            'sentencia_juicio' => 'required',
            'id_conclusion' => 'required',
            'visita_carcelaria' => 'required',
            'id_impugnacion' => 'required',
            'id_orden_aprencion' => 'required',
        ]);

        //Se usa la función create() con el request que guarda el objeto
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
        $expediente = Expediente::find($id);

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
