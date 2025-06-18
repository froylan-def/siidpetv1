<?php

namespace App\Http\Controllers;

use App\Models\Logs;

use Illuminate\Http\Request;
use Carbon\Carbon;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $defensores = Logs::with('defensor', 'defensor.user')->get();
        return response($defensores);
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

        $this->validate($request, [
            'id_defensor' => 'required',
            'accion' => 'required',
            'descripcion' => 'required',
        ]);

        $log = Logs::create( $request->all() );

        // Puedes realizar otras acciones después de la creación, como redireccionar o devolver una respuesta JSON
        return response()->json(['mensaje' => 'Datos guardados con éxito', 'log' => $log ], 201);

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
        $log = Logs::with('defensor',)->find($id);

        //Compara si la consulta encontró datos
        if (! $log ) {
            return response()->json(['mensaje' => 'Datos del log no encontrado'], 404);
        }

        //Lo retorna con un código 201
        return response()->json(['log' => $log], 201);
    }


    public function obtenerDefensorPorIdUsuario($id)
    {
        //Se obtiene el registro de la base de datos
        $logs = Logs::with('defensor')
        ->where('id_defensor', $id)
        ->get();

        //Compara si la consulta encontró datos
        if (! $logs ) {
            return response()->json(['mensaje' => 'Datos de los logs no encontrado'], 404);
        }

        //Lo retorna con un código 201
        return response()->json(['logs' => $logs], 201);
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
        $log = Log::find($id);

        // Verifica si el usuario existe
        if (! $log ) {
            return response()->json(['mensaje' => 'Datos del log no encontrados'], 404);
        }



        // Actualiza los datos con los nuevos datos proporcionados
        $log->update($request->all());

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
        // Encontramos el dato con el id
        $log = Log::find($id);

        // Verificar si el usuario existe
        if ($log) {
            // Eliminar el usuario
            $log->delete();
            $log->save();
            return response()->json(['mensaje' => 'Registo eliminado correctamente'], 201);
        } else {
            return response()->json(['mensaje' => 'No se ha encontrado el registro correspondiente'], 201);
        }


    }


    public function testlogs()
    {
        // return response()->json(['mensaje' => 'algo'], 201 );
        return "Test algo";
    }

    public function busqueda(Request $request)
    {
        // Obtén los parámetros desde la solicitud
        $id_defensor = $request->input('id_defensor');
        $fecha = $request->input('fecha');

        $query = Logs::with('defensor', 'defensor.user');
        
        if ($id_defensor) {
            $query->where('id_defensor', $id_defensor);
        }

        if ($fecha) {
            $query->whereBetween('created_at', [
                Carbon::parse($fecha)->startOfDay(),
                Carbon::parse($fecha)->addDay()->startOfDay()
            ]);
        }

        $logs = $query->get();
        
        return response()->json(['logs' => $logs,], 201);
    }
}
