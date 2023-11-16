<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuentaDiariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cuentaDiaria = DB::table('cuenta_diaria')->get();
        return response( $cuentaDiaria );
    }

    public function obenerImputados(){

        $imputados = DB::table('imputado')->get();
        return response($imputados );

    }

    public function obtenerDelitos(){

        $delitos = DB::table('delito')->get();
        return response( $delitos );

    }

    public function obtenerAudiencias(){

        $audiencias = DB::table('audiencia')->get();
        return response( $audiencias );

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

        $this->validate($request, [
            'num' => 'required',
            'cp' => 'required|max:10',
            'fecha' => 'required',
            'hora' => 'required',
            'sala' => 'required|max:10',
            'imputado' => 'required',
            'delito' => 'required',
            'audiencia' => 'required',
        ]);
        
        DB::table('cuenta_diaria')->insert([
            'num' => $request->input('num'),
            'cp' => $request->input('cp'),
            'fecha' =>  $request->input('fecha'),
            'hora' => $request->input('hora'),
            'sala' => $request->input('sala'),
            'observaciones' => $request->input('observaciones'),
            'resultado' => $request->input('resultado'),
            'imputado' => $request->input('imputado'),
            'delito' => $request->input('delito'),
            'audiencia' => $request->input('audiencia')
        ]);

        return response("Registro guardado con éxito", 200);
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
