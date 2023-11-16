<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = DB::table('users')->get();
        return response($users);
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
            'name' => 'required|max:30',
            'email' => 'required|email',
            'password' => 'required',
            'IDRol' => 'required'
        ]);
        
        DB::table('users')->insert([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' =>  Hash::make( $request->input('password') ) ,
            'created_at' => date('Y-m-d'),
            'IDRol' => $request->input('IDRol')
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
        $this->validate($request, [
            'name' => 'required|max:30',
            'email' => 'required|email',
            'IDRol' => 'required'
        ]);
        //
        $usuario = User::find($id);
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        
        if( $request->input('password') != "" ){
            $usuario->password = Hash::make( $request->input('password') );
        }

        $usuario->IDRol = $request->input('IDRol');
        $usuario->save();

        
        return response("Usuario almacenado correctamente ", 200);
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

    public function eliminarUsuario($id)
    {

        $usuario = User::find($id);
        $usuario->delete();
        return response(["Usuario eliminado correctamente"]);

    }
}
