<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class bitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    public function getBitacora(String $imputado)
    {
        $preeliminar =          DB::table('bitacora_nsjpao')->where('id_etapa',1)->where('id_imputado',$imputado)->get();
        $audienciaInicial =     DB::table('bitacora_nsjpao')->where('id_etapa',2)->where('id_imputado',$imputado)->get();
        $vinculacionAProceso =  DB::table('bitacora_nsjpao')->where('id_etapa',3)->where('id_imputado',$imputado)->get();
        $etapaIntermedia =      DB::table('bitacora_nsjpao')->where('id_etapa',4)->where('id_imputado',$imputado)->get();
        $juicioOral =           DB::table('bitacora_nsjpao')->where('id_etapa',5)->where('id_imputado',$imputado)->get();

        return response([$preeliminar,$audienciaInicial,$vinculacionAProceso,$etapaIntermedia,$juicioOral]);
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
        DB::table('bitacora_nsjpao')->insert([
            'nota' => $request->input('texto'),
            'fecha'=>Carbon::now(),
            'id_imputado' => $request->input('idimputado') ,
            'id_etapa' => $request->input('idEtapa'),
 
        ]);

        return response("Usuario guardado con éxito", 200);
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
    }
}
