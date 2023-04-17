<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class etapaProcesalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
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
        //$NUCS = DB::table('NUC')->where("NUC", strval($request->input('IDNUC')))->get();
        $NUCS = DB::table('NUC')->where("NUC", strval($request->input('IDNUC')))->pluck('id');
        foreach ($NUCS as $NUC) {
            $idNUC=$NUC;
        }
        
        DB::table('historialEtapaProcesal')->insert([
            'idEtapa' =>  1,
            'idImputado' => $request->input('idImputado'),
            'idNUC'  => $idNUC,
            'estado' => 1,
            'estatusImputado' => ""
        ]);
        for ($i=2; $i <=5 ; $i++) 
        { 
            DB::table('historialEtapaProcesal')->insert([
                'idEtapa' =>  $i,
                'idImputado' => $request->input('idImputado'),
                'idNUC'  => $idNUC,
                'estado' => 0,
                'estatusImputado' => ""
            ]);
        }
        return response($NUCS);
    }

    public function finalizarEtapa(Request $request)
    {
        if($request->input('idEtapa')<5)
        {

            DB::table('historialEtapaProcesal')
            ->where('idimputado',$request->input('idimputado'))
            ->where('idEtapa',$request->input('idEtapa'))
            ->update(array(
                'estado'=>2,
            ));
            DB::table('historialEtapaProcesal')
            ->where('idimputado',$request->input('idimputado'))
            ->where('idEtapa',$request->input('idEtapa')+1)
            ->update(array(
                'estado'=>1,
            ));
        }
        
      
    }
    public function masc(Request $request)
    {
        if($request->input('idEtapa')<5)
        {

            DB::table('historialEtapaProcesal')
            ->where('idimputado',$request->input('idimputado'))
            ->where('idEtapa',$request->input('idEtapa'))
            ->update(array(
                'estado'=>2,
            ));
            DB::table('imputado')
            ->where('id',$request->input('idimputado'))
 
            ->update(array(
                'estado'=>"Reparacion de daños",
            ));
             
        }
        
      
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
    
    public function getEstados($imputado)
    {
        $estados = DB::table('historialEtapaProcesal')->where("idImputado", $imputado)->pluck('estado');
        return response($estados);
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
