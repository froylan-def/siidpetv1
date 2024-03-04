<?php

use App\Http\Controllers\ConclusionController;
use App\Http\Controllers\CuentaDiariaController;
use App\Http\Controllers\DefensorController;
use App\Http\Controllers\delitoController;
use App\Http\Controllers\GoogleDriveController;
use App\Http\Controllers\paisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
//use App\Http\Controllers\NUCController;
use App\Http\Controllers\municipioController;
use App\Http\Controllers\imputadoController;
use App\Http\Controllers\PermisosController;
//use App\Http\Controllers\bitacoraController;
use App\Http\Controllers\PeticionarioController;
use App\Http\Controllers\etapaProcesalController;
use App\Http\Controllers\sexoController;
use App\Http\Controllers\UgiController;
use App\Http\Controllers\entrevistaController;
use App\Http\Controllers\VictimaController;
use App\Http\Controllers\flagranciaController;
use App\Http\Controllers\AsignacionMedidasController;
use App\Http\Controllers\AcuerdoSedeMinisterialController;
use App\Http\Controllers\juezControlController;
use App\Http\Controllers\AcuerdoReparatorioController;
use App\Http\Controllers\investigacionComplementariaController;
use App\Http\Controllers\prorrogaPlazoInvestigacionComplemenatriaController;
use App\Http\Controllers\medidaCautelarController;
use App\Http\Controllers\SuspencionCondicionalProcesoController;
use App\Http\Controllers\procedimientoAbreviadoController;
use App\Http\Controllers\tribunalEnjuiciamientoController;
//use App\Http\Controllers\conclusionController;
use App\Http\Controllers\ImpugnacionController;
use App\Http\Controllers\estadoController;
use App\Http\Controllers\escolaridadController;
use App\Http\Controllers\ocupacionController;
use App\Http\Controllers\estatusSedeMinisterialController;
use App\Http\Controllers\medidaCautelarAController;
use App\Http\Controllers\MedidaProteccionController;
use App\Http\Controllers\DetencionController;
use App\Http\Controllers\ordenAprencionController;
use App\Http\Controllers\expedienteController;
use App\Http\Controllers\CoordinacionController;

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

    Route::get('/permisos/{id}', [PermisosController::class, 'obtenerPermisosPorRol']);
    Route::get('/users/eliminar/{id}', [UserController::class, 'eliminarUsuario' ] );
    Route::get('/permisos/{id}', [PermisosController::class, 'obtenerPermisosPorRol']);
    Route::get('imputado/NUC/{nuc}', [imputadoController::class, 'getImputadosPorNuc']);
    //Route::get('/bitacora/notas/{imputado}', [bitacoraController::class, 'getBitacora']);
    Route::get('/etapa/imputado/{imputado}', [etapaProcesalController::class, 'getEstados']);
    Route::post('/etapa/finalizar/', [etapaProcesalController::class, 'finalizarEtapa']);
    Route::post('/etapa/masc/', [etapaProcesalController::class, 'masc']);
    //Route::get('/googleDrive', [GoogleDriveController::class, 'subirArchivo']);
    Route::get('/peticionario/eliminar/{id}', [PeticionarioController::class, 'eliminarPeticionario']);
    Route::get('/obenerimputados', [CuentaDiariaController::class, 'obenerImputados']);
    Route::get('/obtenerdelitos', [CuentaDiariaController::class, 'obtenerDelitos']);
    Route::get('/obteneraudiencias', [CuentaDiariaController::class, 'obtenerAudiencias']);


    Route::resource('cuentadiaria', CuentaDiariaController::class);
    Route::resource('peticionario', PeticionarioController::class);
    Route::resource('users', UserController::class);
    //Route::resource('NUCs', NUCController::class);
    Route::resource('municipios', municipioController::class);
    Route::resource('imputado', imputadoController::class);
    //Route::resource('bitacora', bitacoraController::class);
    Route::resource('etapaProcesal', etapaProcesalController::class);
    Route::resource('sexo', sexoController::class);

    
    //Nuevos controladores
    Route::resource('ugi', UgiController::class);
    Route::resource('defensor', DefensorController::class);
    Route::resource('entrevista', entrevistaController::class);
    Route::resource('delito', delitoController::class);
    Route::resource('victima', victimaController::class);
    Route::resource('flagrancia', flagranciaController::class);
    Route::resource('asignacionmedidas', AsignacionMedidasController::class);
    Route::resource('acuerdosedeministerial', AcuerdoSedeMinisterialController::class);
    Route::resource('juezcontrol', juezControlController::class);
    Route::resource('acuerdoreparatorio', AcuerdoReparatorioController::class);
    Route::resource('investigacioncomplementaria', investigacionComplementariaController::class);
    Route::resource('prorrogaplazoinvestigacion', prorrogaPlazoInvestigacionComplemenatriaController::class);
    Route::resource('medidacautelar', medidaCautelarController::class);
    Route::resource('suspencioncondicional', SuspencionCondicionalProcesoController::class);
    Route::resource('procedimientoabreviado', procedimientoAbreviadoController::class);
    Route::resource('tribunalenjuiciamiento', tribunalEnjuiciamientoController::class);
    Route::resource('conclusion', ConclusionController::class);
    Route::resource('impugnacion', ImpugnacionController::class);
    Route::resource('estado', estadoController::class);
    Route::resource('pais', paisController::class);
    Route::resource('escolaridad', escolaridadController::class);
    Route::resource('ocupacion', ocupacionController::class);
    Route::resource('estatussedeministerial', estatusSedeMinisterialController::class);
    Route::resource('medidacautelara', medidaCautelarAController::class);
    Route::resource('medidaproteccion', MedidaProteccionController::class);
    Route::resource('detencion', DetencionController::class);
    Route::resource('ordenaprencion', ordenAprencionController::class);
    Route::resource('expediente', expedienteController::class);
    Route::resource('coordinacion', CoordinacionController::class);

    Route::get('/{any}', function () {
        return view('home');
    })->where("any", ".*");
 });




