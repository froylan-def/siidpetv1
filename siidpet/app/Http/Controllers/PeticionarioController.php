<?php

namespace App\Http\Controllers;

use App\Models\Peticionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Direccion;

class PeticionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peticionarios = DB::table('peticionario')
            ->select('*')
            ->join('direccion', 'direccion.id', '=', 'peticionario.id_direccion')
            ->get();


        //$peticionario = DB::table('peticionario')->get();
        return response( $peticionarios );
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
            'nombres' => 'required|max:30',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'correo' => 'email',
            'telefono' => 'required',
            'calle' => 'required',
            'colonia' => 'required',
            'municipio' => 'required',
        ]);

        $id_direccion = DB::table('direccion')->insertGetId(
            array(
                'calle' => $request->input('calle'),
                'colonia' => $request->input('colonia'),
                'municipio' => $request->input('municipio'),
                'estado' => $request->input('estado'),
                'pais' => $request->input('pais'),
                'codigo_postal' => $request->input('codigo_postal'),
                'num_ext' => $request->input('num_ext'),
                'num_int' => $request->input('num_int')
                )
        );

        
        DB::table('peticionario')->insert([
            'nombres' => $request->input('nombres'),
            'apellidoP' => $request->input('apellidoP'),
            'apellidoM' => $request->input('apellidoM'),
            'CURP' => $request->input('CURP'),
            'correo' => $request->input('correo'),
            'telefono' => $request->input('telefono'),
            'telefono_particular' => $request->input('telefono_particular'),
            'id_direccion' => $id_direccion
        ]);

        return response("Peticionario guardado con éxito", 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peticionario  $peticionario
     * @return \Illuminate\Http\Response
     */
    public function show(Peticionario $peticionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peticionario  $peticionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Peticionario $peticionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peticionario  $peticionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        $id_peticionario = $request->input('id');
        $peticionario = Peticionario::find( $id_peticionario );

        $peticionario->nombres = $request->input("nombres");
        $peticionario->apellidoP = $request->input("apellidoP");
        $peticionario->apellidoM = $request->input("apellidoM");
        $peticionario->CURP = $request->input("CURP");
        $peticionario->correo = $request->input("correo");
        $peticionario->telefono = $request->input("telefono");
        $peticionario->telefono_particular = $request->input("telefono_particular");
        $peticionario->save();

        $id_direccion = $request->input('id_direccion');
        $direccion = Direccion::find($id_direccion);

        $direccion->calle = $request->input('calle');
        $direccion->colonia = $request->input('colonia');
        $direccion->municipio = $request->input('municipio');
        $direccion->ciudad = $request->input('ciudad');
        $direccion->estado = $request->input('estado');
        $direccion->pais = $request->input('pais');
        $direccion->num_ext = $request->input('num_ext');
        $direccion->num_int = $request->input('num_int');

        $direccion->save();

        

        return response('Información guardada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peticionario  $peticionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peticionario $peticionario)
    {
        //

    }
}
