<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class imputadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response("Imputados guardado con éxito", 200);
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
            'nombres' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'CURP' => 'required|min:18|max:18',
            'IDMunicipio' => 'required',
            'direccion' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|min:10',
        ]);
        
        $id=DB::table('imputado')->insertGetID([
            'nombres' => $request->input('nombres'),
            'apellidoP' => $request->input('apellidoP'),
            'apellidoM' => $request->input('apellidoM'),
            'CURP' => $request->input('CURP'),
            'IDMunicipio' => $request->input('IDMunicipio'),
            'direccion' => $request->input('direccion'),
            'correo' => $request->input('correo'),
            'telefono' => $request->input('telefono'),
        ]);

        //$idnuc = DB::table('NUC')->where('NUC', $request->input('IDNUC'))->get();
        $idnuc = DB::table('NUC')->where('NUC',$request->input('IDNUC'))->get();
        DB::table('NUCImputado')->insert([
            'IDImputado' =>  $id,
            'IDNUC' => $idnuc[0]->id,
        ]);

        return response($id);
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


    public function getImputadosPorNuc(string $nuc){
        //return response($nuc);
        $idnuc = DB::table('NUC')->where('NUC', $nuc)->value('id');
        $datos=DB::table('NUCImputado')
        //->join('NUCImputado','imputado.id','NUCImputado.IDImputado')
        ->join('imputado','NUCImputado.IDImputado','=','imputado.id')
        ->where('NUCImputado.IDNUC',$idnuc)
        ->get();
        return response($datos);
    }
}
