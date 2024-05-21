<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConclusionController;
use App\Http\Controllers\CuentaDiariaController;
use App\Http\Controllers\DefensorController;
use App\Http\Controllers\GoogleDriveController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\ImputadoController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\PeticionarioController;
use App\Http\Controllers\EtapaProcesalController;
use App\Http\Controllers\SexoController;
use App\Http\Controllers\UgiController;
use App\Http\Controllers\EntrevistaController;
use App\Http\Controllers\VictimaController;
use App\Http\Controllers\FlagranciaController;
use App\Http\Controllers\AsignacionMedidasController;
use App\Http\Controllers\AcuerdoSedeMinisterialController;
use App\Http\Controllers\JuezControlController;
use App\Http\Controllers\AcuerdoReparatorioController;
use App\Http\Controllers\InvestigacionComplementariaController;
use App\Http\Controllers\ProrrogaPlazoInvestigacionComplemenatriaController;
use App\Http\Controllers\MedidaCautelarController;
use App\Http\Controllers\SuspencionCondicionalProcesoController;
use App\Http\Controllers\ProcedimientoAbreviadoController;
use App\Http\Controllers\TribunalEnjuiciamientoController;
use App\Http\Controllers\ImpugnacionController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\EscolaridadController;
use App\Http\Controllers\OcupacionController;
use App\Http\Controllers\EstatusSedeMinisterialController;
use App\Http\Controllers\MedidaCautelarAController;
use App\Http\Controllers\MedidaProteccionController;
use App\Http\Controllers\DetencionController;
use App\Http\Controllers\OrdenAprencionController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\CoordinacionController;
use App\Http\Controllers\DelitoProcesoController;
use App\Http\Controllers\delitoController;

Auth::routes();

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/home', function () {
        return redirect('/');
    });

    // ruta personalizada
    

    Route::get('/permisos/{id}', [PermisosController::class, 'obtenerPermisosPorRol']);
    Route::get('/users/eliminar/{id}', [UserController::class, 'eliminarUsuario']);
    Route::get('/permisos/{id}', [PermisosController::class, 'obtenerPermisosPorRol']);
    Route::get('imputado/NUC/{nuc}', [ImputadoController::class, 'getImputadosPorNuc']);
    Route::get('/etapa/imputado/{imputado}', [EtapaProcesalController::class, 'getEstados']);
    Route::post('/etapa/finalizar/', [EtapaProcesalController::class, 'finalizarEtapa']);
    Route::post('/etapa/masc/', [EtapaProcesalController::class, 'masc']);
    Route::get('/peticionario/eliminar/{id}', [PeticionarioController::class, 'eliminarPeticionario']);
    Route::get('/obenerimputados', [CuentaDiariaController::class, 'obenerImputados']);
    Route::get('/obtenerdelitos', [CuentaDiariaController::class, 'obtenerDelitos']);
    
    
    //Route::get('/obteneraudienciass', [CuentaDiariaController::class, 'obtenerAudiencias']);
    Route::get('/123', [CuentaDiariaController::class, 'obtenerAudiencias']);

    
    Route::resource('cuentadiaria', CuentaDiariaController::class);
    Route::resource('peticionario', PeticionarioController::class);
    Route::resource('users', UserController::class);
    Route::resource('municipios', MunicipioController::class);
    Route::resource('imputado', ImputadoController::class);
    Route::resource('etapaProcesal', EtapaProcesalController::class);
    Route::resource('sexo', SexoController::class);
    Route::get('activarugi', [UgiController::class, 'activar']);
    Route::resource('ugi', UgiController::class);
    Route::resource('defensor', DefensorController::class);
    Route::resource('entrevista', EntrevistaController::class);
    Route::resource('victima', VictimaController::class);
    Route::resource('flagrancia', FlagranciaController::class);
    Route::resource('asignacionmedidas', AsignacionMedidasController::class);
    Route::resource('acuerdosedeministerial', AcuerdoSedeMinisterialController::class);
    Route::resource('juezcontrol', JuezControlController::class);
    Route::resource('acuerdoreparatorio', AcuerdoReparatorioController::class);
    Route::resource('investigacioncomplementaria', InvestigacionComplementariaController::class);
    Route::resource('prorrogaplazoinvestigacion', ProrrogaPlazoInvestigacionComplemenatriaController::class);
    Route::resource('medidacautelar', MedidaCautelarController::class);
    Route::resource('suspencioncondicional', SuspencionCondicionalProcesoController::class);
    Route::resource('procedimientoabreviado', ProcedimientoAbreviadoController::class);
    Route::resource('tribunalenjuiciamiento', TribunalEnjuiciamientoController::class);
    Route::resource('conclusion', ConclusionController::class);
    Route::resource('impugnacion', ImpugnacionController::class);
    Route::resource('estado', EstadoController::class);
    Route::resource('pais', PaisController::class);
    Route::resource('escolaridad', EscolaridadController::class);
    Route::resource('ocupacion', OcupacionController::class);
    Route::resource('estatussedeministerial', EstatusSedeMinisterialController::class);
    Route::resource('medidacautelara', MedidaCautelarAController::class);
    Route::resource('medidaproteccion', MedidaProteccionController::class);
    Route::resource('detencion', DetencionController::class);
    Route::resource('ordenaprencion', OrdenAprencionController::class);
    Route::resource('expediente', ExpedienteController::class);
    Route::resource('coordinacion', CoordinacionController::class);
    Route::resource('delitoproceso', DelitoProcesoController::class);
    Route::resource('delito', delitoController::class);

    Route::get('/{any}', function () {
        return view('home');
    })->where("any", ".*");
});



