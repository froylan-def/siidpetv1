<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendario;
use Illuminate\Support\Facades\Auth;


class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Obtén el usuario loggeado
         $user = Auth::user();
         $id_defensor = \Session::get('defensor');
         $id_coordinacion = \Session::get('coordinacion');
 
         if( $user->IDRol === 1 || $user->IDRol === 2 || $user->IDRol === 3 ){
             // Consulta si es administrador
             $expediente = Calendario::with('defensor','defensor.user', 'defensor.municipio', 'defensor.coordinacion')->orderBy('updated_at', 'desc')->get();
 
         }else if( $user->IDRol === 5 ){
 
             // Consulta si es coordinador
             $expediente = Calendario::with('defensor', 'defensor.user', 'defensor.municipio', 'defensor.coordinacion')->whereHas('defensor', function ($query) use ($id_coordinacion) {
                 $query->where('id_coordinacion', $id_coordinacion);
             })->orderBy('updated_at', 'desc')->get();
 
         }else{
             // Consulta si es otro rol que no sea administrador o coordinador
             $expediente = Calendario::with('defensor', 'defensor.user', 'defensor.municipio', 'defensor.coordinacion')->select('*') 
             ->where('id_defensor', $id_defensor )
             ->orderBy('updated_at', 'desc')
             ->get();
         }
 
         return response( $expediente );
         // return response( $user );
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
        // Obtén el usuario loggeado
        $user = Auth::user();
        $id_defensor = \Session::get('defensor');
        $id_coordinacion = \Session::get('coordinacion');
    
        //Se validan los datos a traves de laravel
        $request->validate([
            'evento' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required',
        ]);

        $id_defensor = $request->input('id_defensor');
        $data = $request->all();

        if( $id_defensor === "" ){            
            $data['id_defensor'] = $id_defensor;
        }
        

        // Se usa la función create() con el request que guarda el objeto
        $evento = Calendario::create( $data );

        // Puedes realizar otras acciones después de la creación, como redireccionar o devolver una respuesta JSON
        return response()->json(['mensaje' => 'Datos guardados con éxito', 'evento' => $evento ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $id_defensor_sesion = \Session::get('defensor');
        $id_coordinacion_sesion = \Session::get('coordinacion');

        //Se obtiene el registro de la base de datos
        $calendario = Calendario::with('defensor', 'defensor.user', 'defensor.municipio', 'defensor.coordinacion')->find($id);

        if (! $calendario) {
            return response()->json(['mensaje' => 'Datos del expediente no encontrados'], 201);
        }

        $id_coordinacion = $calendario->defensor->id_coordinacion ?? null;
        $id_defensor = $calendario->id_defensor;
        $denegado = false;

        if( $user->IDRol === 1 || $user->IDRol === 2 || $user->IDRol === 3 ){
            // Consulta si es admin o director
            $denegado = false;
        } else if( $user->IDRol === 5 ){
            // Consulta si es coordinador
            if($id_coordinacion == $id_coordinacion_sesion){
                $denegado = false;
            }else{
                $denegado = true;
            }
        }else{
            // Consulta si es otro rol que no sea administrador o coordinador
            if( $id_defensor == $id_defensor_sesion ){
                $denegado = false;
            }else{
                $denegado = true;
            }
        }

        if($denegado){
            return response()->json(['mensaje' => 'Acceso no permitido'], 201);
        }else{
            return response()->json(['evento' => $calendario], 201);
        }
        
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

        $request->validate([
            'id_defensor' => 'required',
            'evento' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required',
        ]);


        // Encontramos el dato con el id
        $calendario = Calendario::find($id);

        // Verifica si el evento existe
        if (! $calendario ) {
            return response()->json(['mensaje' => 'Datos del calendario no encontrados'], 404);
        }

        // Actualiza los datos con los nuevos datos proporcionados
        $calendario->update($request->all());

        // Puedes devolver una respuesta JSON, un mensaje de éxito, etc.
        return response()->json(['mensaje' => 'Datos actualizados con éxito']);
    }





    public function busquedaConFiltros(Request $request)
    {
        // Obtén los parámetros desde la solicitud
        $id_coordinacion = $request->input('id_coordinacion'); // Ejemplo: [1,2,3,4,5]
        $id_municipio = $request->input('id_municipio'); // Ejemplo: 1 (puedes pasarlo como null para incluir todos)
        $id_defensor = $request->input('id_defensor'); // Ejemplo: [1,3,5,7]


        
        // Construir la consulta
        $query = Calendario::with([
            'defensor','defensor.user', 'defensor.municipio', 'defensor.coordinacion'
        ]);

        // Aplicar los filtros dinámicos
        // Aplicar filtros en la relación defensor
        if ($id_defensor || $id_coordinacion || $id_municipio) {
            $query->whereHas('defensor', function ($query) use ($id_defensor, $id_coordinacion, $id_municipio) {
                if ($id_defensor) {
                    $query->whereIn('id', $id_defensor); // Filtro dinámico para defensor.id
                }

                if ($id_coordinacion) {
                    $query->whereIn('id_coordinacion', $id_coordinacion); // Filtro dinámico para defensor.id_coordinacion
                }

                if ($id_municipio) {
                    $query->where('id_municipio', $id_municipio); // Filtro específico para defensor.id_municipio
                }
            });
        }

        // Obtener los resultados
        $expedientes = $query->get();

        return response()->json($expedientes);
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calendario = Calendario::find($id);

        // Verificar si el usuario existe
        if ( $calendario ) {
            // Eliminar el usuario
            $calendario->delete();
            return response()->json(['mensaje' => 'Datos del calendario eliminados correctamente'], 201);
        } else {
            return response()->json(['mensaje' => 'No se ha encontrado el evento'], 201);
        }
    }
}
