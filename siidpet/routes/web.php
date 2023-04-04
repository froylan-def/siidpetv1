<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NUCController;
use App\Http\Controllers\municipioController;
use App\Http\Controllers\imputadoController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\bitacoraController;
use App\Http\Controllers\PeticionarioController;
use App\Http\Controllers\etapaProcesalController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => ['auth'], 'middleware' => ['access'] ], function() {
   
    

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/home', function () {
        return redirect('/');
    });


    Route::get('/permisos/{id}', [PermisosController::class, 'obtenerPermisosPorRol']);

    Route::get('/permisos/{id}', [PermisosController::class, 'obtenerPermisosPorRol']);
    Route::get('imputado/NUC/{nuc}', [imputadoController::class, 'getImputadosPorNuc']);
    Route::get('/bitacora/notas/{imputado}', [bitacoraController::class, 'getBitacora']);
    Route::get('/etapa/imputado/{imputado}', [etapaProcesalController::class, 'getEstados']);

    Route::resource('peticionario', PeticionarioController::class);
    Route::resource('users', UserController::class);
    Route::resource('NUCs', NUCController::class);
    Route::resource('municipios', municipioController::class);
    Route::resource('imputado', imputadoController::class);
    Route::resource('bitacora', bitacoraController::class);
    Route::resource('etapaProcesal', etapaProcesalController::class);


    Route::get('/{any}', function () {
        return view('home');
    })->where("any", ".*");
 });




