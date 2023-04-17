<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         
        
        DB::table('roles')->insert(['nombre' => 'Administrador']);
        DB::table('roles')->insert(['nombre' => 'Director General']);
        DB::table('roles')->insert(['nombre' => 'Director Defensoria']);
        DB::table('roles')->insert(['nombre' => 'Director Asesoria']);
        DB::table('roles')->insert(['nombre' => 'Jefe de Asesorias']);
        DB::table('roles')->insert(['nombre' => 'Defensor']);
        DB::table('roles')->insert(['nombre' => 'Asesor']);
        DB::table('users')->insert(['name'=>'Administrador1','email'=>'prueba1@idpet.com.mx','password'=>Hash::make('12345678'),'IDRol'=>1]);
        DB::table('users')->insert(['name'=>'Administrador1','email'=>'prueba2@idpet.com.mx','password'=>Hash::make('12345678'),'IDRol'=>1]);

        DB::table('coordinacion')->insert(['nombre'=>'Victoria']);
        DB::table('coordinacion')->insert(['nombre'=>'Mante']);
        DB::table('coordinacion')->insert(['nombre'=>'Matamoros']);
        DB::table('coordinacion')->insert(['nombre'=>'Nuevo Laredo']);
        DB::table('coordinacion')->insert(['nombre'=>'Reynosa']);
        DB::table('coordinacion')->insert(['nombre'=>'Madero']);

        DB::table('municipio')->insert(['nombre'=>'Abasolo','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Aldama','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Altamira','IDCoordinacion'=>6]);
        DB::table('municipio')->insert(['nombre'=>'Antiguo Morelos','IDCoordinacion'=>2,]);
        DB::table('municipio')->insert(['nombre'=>'Burgos','IDCoordinacion'=>3]);
        DB::table('municipio')->insert(['nombre'=>'Bustamante','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Camargo','IDCoordinacion'=>5]);
        DB::table('municipio')->insert(['nombre'=>'Casas','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Madero','IDCoordinacion'=>6]);
        DB::table('municipio')->insert(['nombre'=>'Cruillas','IDCoordinacion'=>3]);
        DB::table('municipio')->insert(['nombre'=>'Gómez Farías','IDCoordinacion'=>2]);
        DB::table('municipio')->insert(['nombre'=>'González','IDCoordinacion'=>2]);
        DB::table('municipio')->insert(['nombre'=>'Güémez','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Guerrero','IDCoordinacion'=>5,]);
        DB::table('municipio')->insert(['nombre'=>'Gustavo Díaz Ordaz','IDCoordinacion'=>6]);
        DB::table('municipio')->insert(['nombre'=>'Hidalgo','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Jaumave','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Jiménez','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Llera','IDCoordinacion'=>2]);
        DB::table('municipio')->insert(['nombre'=>'Mainero','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'El Mante','IDCoordinacion'=>2]);
        DB::table('municipio')->insert(['nombre'=>'Matamoros','IDCoordinacion'=>3]);
        DB::table('municipio')->insert(['nombre'=>'Méndez','IDCoordinacion'=>3]);
        DB::table('municipio')->insert(['nombre'=>'Mier','IDCoordinacion'=>5]);
        DB::table('municipio')->insert(['nombre'=>'Miguel Alemán','IDCoordinacion'=>5]);
        DB::table('municipio')->insert(['nombre'=>'Miquihuana','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Nuevo Laredo','IDCoordinacion'=>4]);
        DB::table('municipio')->insert(['nombre'=>'Nuevo Morelos','IDCoordinacion'=>2]);
        DB::table('municipio')->insert(['nombre'=>'Ocampo','IDCoordinacion'=>2]);
        DB::table('municipio')->insert(['nombre'=>'Padilla','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Palmillas','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Reynosa','IDCoordinacion'=>5]);
        DB::table('municipio')->insert(['nombre'=>'Río Bravo','IDCoordinacion'=>5]);
        DB::table('municipio')->insert(['nombre'=>'San Carlos','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'San Fernando','IDCoordinacion'=>3]);
        DB::table('municipio')->insert(['nombre'=>'San Nicolás','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Soto la Marina','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Tampico','IDCoordinacion'=>6]);
        DB::table('municipio')->insert(['nombre'=>'Tula','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Valle Hermoso','IDCoordinacion'=>3]);
        DB::table('municipio')->insert(['nombre'=>'Victoria','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Villagrán','IDCoordinacion'=>1]);
        DB::table('municipio')->insert(['nombre'=>'Xicoténcatl','IDCoordinacion'=>2]);


        //Seeds de Permisos 
        DB::table('permisos')->insert(['nombre' => 'Dashboard','detalles' => 'Ver dashboard', 'ruta' => '/' ,'fecha' => '2023-03-10']);
        DB::table('permisos')->insert(['nombre' => 'Ver usuarios','detalles' => 'Ver usuarios', 'ruta' => '/usuarios' ,'fecha' => '2023-03-10']);
        DB::table('permisos')->insert(['nombre' => 'Editar usuarios','detalles' => 'Editar usuarios', 'ruta' => '/usuarios' ,'fecha' => '2023-03-10']);
        DB::table('permisos')->insert(['nombre' => 'Eliminar usuarios','detalles' => 'Eliminar usuarios', 'ruta' => '/usuarios' ,'fecha' => '2023-03-10']);
        DB::table('permisos')->insert(['nombre' => 'Registrar usuarios','detalles' => 'Registrar usuarios', 'ruta' => '/usuarios' ,'fecha' => '2023-03-10']);
        DB::table('permisos')->insert(['nombre' => 'Ver NUC','detalles' => 'Ver dashboard', 'ruta' => '/NUC' ,'fecha' => '2023-03-10']);
        DB::table('permisos')->insert(['nombre' => 'Editar NUC','detalles' => 'Editar dashboard', 'ruta' => '/NUC' ,'fecha' => '2023-03-10']);
        DB::table('permisos')->insert(['nombre' => 'Eliminar NUC','detalles' => 'Eliminar dashboard', 'ruta' => '/NUC' ,'fecha' => '2023-03-10']);
        DB::table('permisos')->insert(['nombre' => 'Registrar NUC','detalles' => 'Registrar dashboard', 'ruta' => '/NUC' ,'fecha' => '2023-03-10']);
        
        DB::table('etapa')->insert(['nombre' => 'Preeliminar','descripcion' => '']);
        DB::table('etapa')->insert(['nombre' => 'Audiencia inicial','descripcion' => '']);
        DB::table('etapa')->insert(['nombre' => 'Vinculacion a proceso','descripcion' => '']);
        DB::table('etapa')->insert(['nombre' => 'Etapa intermedia','descripcion' => '']);
        DB::table('etapa')->insert(['nombre' => 'Juicio Oral','descripcion' => '']);
        
        DB::table('sexo')->insert(['sexo' => 'Hombre']);
        DB::table('sexo')->insert(['sexo' => 'Mujer']);
    }
}
