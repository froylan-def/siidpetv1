<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermisosController extends Controller
{
    //
    public function obtenerPermisosPorRol($id)
    {
        //
        $permisos = DB::table('rol_permiso')
        ->select('*')
        ->join('permisos', 'rol_permiso.idpermiso', '=', 'permisos.id')
        ->where('rol_permiso.idrol', $id)
        ->get();
        
        return response($permisos);
    }
}
