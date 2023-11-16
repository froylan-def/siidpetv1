<?php

use App\Http\Controllers\CuentaDiariaController;
use App\Http\Controllers\GoogleDriveController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NUCController;
use App\Http\Controllers\municipioController;
use App\Http\Controllers\imputadoController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\bitacoraController;
use App\Http\Controllers\PeticionarioController;
use App\Http\Controllers\etapaProcesalController;
use App\Http\Controllers\sexoController;
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
//, 'middleware' => ['access']
Route::group(['middleware' => ['auth'], 'middleware' => ['access'] ], function() {
   
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/home', function () {
        return redirect('/');
    });


    //Route::get('google-drive/file-upload',[GoogleDriveController::class,'googleDriveFilePpload'])->name('google.drive.file.upload');
    

    Route::get('/permisos/{id}', [PermisosController::class, 'obtenerPermisosPorRol']);
    Route::get('/users/eliminar/{id}', [UserController::class, 'eliminarUsuario' ] );

    Route::get('/permisos/{id}', [PermisosController::class, 'obtenerPermisosPorRol']);
    Route::get('imputado/NUC/{nuc}', [imputadoController::class, 'getImputadosPorNuc']);
    Route::get('/bitacora/notas/{imputado}', [bitacoraController::class, 'getBitacora']);
    Route::get('/etapa/imputado/{imputado}', [etapaProcesalController::class, 'getEstados']);
    Route::post('/etapa/finalizar/', [etapaProcesalController::class, 'finalizarEtapa']);
    Route::post('/etapa/masc/', [etapaProcesalController::class, 'masc']);
    

    //Route::post('/peticionario/guardar/', [PeticionarioController::class, 'update'] );

    Route::get('/googleDrive', [GoogleDriveController::class, 'subirArchivo']);


    Route::get('/peticionario/eliminar/{id}', [PeticionarioController::class, 'eliminarPeticionario']);



    Route::get('/obenerimputados', [CuentaDiariaController::class, 'obenerImputados']);
    Route::get('/obtenerdelitos', [CuentaDiariaController::class, 'obtenerDelitos']);
    Route::get('/obteneraudiencias', [CuentaDiariaController::class, 'obtenerAudiencias']);


    Route::resource('cuentadiaria', CuentaDiariaController::class);
    Route::resource('peticionario', PeticionarioController::class);
    Route::resource('users', UserController::class);
    Route::resource('NUCs', NUCController::class);
    Route::resource('municipios', municipioController::class);
    Route::resource('imputado', imputadoController::class);
    Route::resource('bitacora', bitacoraController::class);
    Route::resource('etapaProcesal', etapaProcesalController::class);
    Route::resource('sexo', sexoController::class);
    
    Route::get('/{any}', function () {
        return view('home');
    })->where("any", ".*");
 });




