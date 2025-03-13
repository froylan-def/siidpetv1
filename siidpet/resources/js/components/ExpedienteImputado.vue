<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Expediente Imputado ....</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Expediente</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <form>
            <div class="form-group">
                <label for="FOJA LIBRO">FOJA LIBRO</label>
                <input v-model="form.name" type="number" class="form-control" id="FOJA" aria-describedby="emailHelp" placeholder="3">
                <div style="color: red;" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
            </div>
        </form>

        <div class="form-group">
            <label for="UGI">UGI</label>
            <select v-model="form.IDRol" id="UGI" type="text" class="form-control " name="UGI">
                <option value=""> Seleccione una opcion </option>
                <option value="1"> Administrador </option>
                <option value="2"> Director General </option>
                <option value="3"> Director Defensoria </option>
                <option value="4"> Director Asesoria </option>
                <option value="5"> Jefe de Asesorias </option>
                <option value="6"> Defensor </option>
                <option value="7"> Asesor </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <div class="form-group">
            <label for="DEFENSOR QUE CUBRE ENTREVISTA">DEFENSOR QUE CUBRE ENTREVISTA</label>
            <select v-model="form.IDRol" id="DefensorEntrevista" type="text" class="form-control " name="DefensorEntrevista">
                <option value=""> Seleccione una opcion </option>
                <option value="1"> Administrador </option>
                <option value="2"> Director General </option>
                <option value="3"> Director Defensoria </option>
                <option value="4"> Director Asesoria </option>
                <option value="5"> Jefe de Asesorias </option>
                <option value="6"> Defensor </option>
                <option value="7"> Asesor </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <div class="form-group">
            <label for="NUC-RAC-EXH">NUC-RAC-EXH</label>
            <input v-model="form.email" type="text" class="form-control" id="NUC-RAC-EXH" placeholder="02/2015">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="FECHA DE ENTREVISTA">FECHA DE ENTREVISTA</label>
            <input v-model="form.email" type="date" class="form-control" id="FechaEntrevista">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>
       
        <div class="form-group">
            <label for="IMPUTADO">IMPUTADO</label>
            <select v-model="form.IDRol" id="Imputado" type="text" class="form-control " name="Imputado">
                <option value=""> Seleccione una opcion </option>
                <option value="1"> Administrador </option>
                <option value="2"> Director General </option>
                <option value="3"> Director Defensoria </option>
                <option value="4"> Director Asesoria </option>
                <option value="5"> Jefe de Asesorias </option>
                <option value="6"> Defensor </option>
                <option value="7"> Asesor </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>
      
        <div class="form-group">
            <label for="DELITO">DELITO</label>
            <select v-model="form.IDRol" id="Delito" type="text" class="form-control " name="Delito">
                <option value=""> Seleccione una opcion </option>
                <option value="1"> Administrador </option>
                <option value="2"> Director General </option>
                <option value="3"> Director Defensoria </option>
                <option value="4"> Director Asesoria </option>
                <option value="5"> Jefe de Asesorias </option>
                <option value="6"> Defensor </option>
                <option value="7"> Asesor </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <div class="form-group">
            <label for="VICTIMA">VICTIMA</label>
            <input v-model="form.email" type="text" class="form-control" id="Victima">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <h5 class="m-0">FLAGRANCIA</h5><br>
        <div class="form-group">
            <label for="FECHA DE FLAGRANCIA">FECHA</label>
            <input v-model="form.email" type="date" class="form-control" id="FechaFlagracia">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="HORA FLAGRANCIA">HORA</label>
            <input v-model="form.email" type="TEXT" class="form-control" id="HoraEntrevista" placeholder="08:00 AM">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <h5 class="m-0">EXAMEN DE LA DETENCION</h5><br>
        <div class="form-group">
            <label for="FECHA DE EXAMEN DE LA DETENCION">FECHA</label>
            <input v-model="form.email" type="date" class="form-control" id="FechaExamenDetencion">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="HORA EXAMEN DE LA DETENCION">HORA</label>
            <input v-model="form.email" type="TEXT" class="form-control" id="HoraExamenDetencion" placeholder="08:00 AM">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="RESULTADO">RESULTADO</label>
            <select v-model="form.IDRol" id="ResultadoExamenDetencion" type="text" class="form-control " name="ResultadoExamenDetencion">
                <option value=""> Seleccione una opcion </option>
                <option value="L"> LIBERTAD </option>
                <option value="D"> DETENCION </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <div class="form-group">
            <label for="DETERMINACION DEL MP">DETERMINACION DEL MP</label>
            <select v-model="form.IDRol" id="DeterminacionMP" type="text" class="form-control " name="DeterminacionMP">
                <option value=""> Seleccione una opcion </option>
                <option value="L"> LIBERTAD </option>
                <option value="D"> DETENCION </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <h5 class="m-0">ORDEN DE APREHENSIÓN/ COMPARECENCIA</h5><br>
        <div class="form-group">
            <label for="FECHA DE ORDEN DE APREHENSIÓN">FECHA</label>
            <input v-model="form.email" type="date" class="form-control" id="FechaOrdenAprencion">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="HORA ORDEN DE APREHENSIÓN">HORA</label>
            <input v-model="form.email" type="TEXT" class="form-control" id="HoraOrdenAprencion" placeholder="08:00 AM">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <h5 class="m-0">MEDIDAS DE PROTECCIÓN</h5><br>
        <div class="form-group">
            <label for="MEDIDA">MEDIDA</label>
            <select v-model="form.IDRol" id="medidaProteccion" type="text" class="form-control " name="medidaProteccion">
                <option value=""> Seleccione una opcion </option>
                <option value="L"> LIBERTAD </option>
                <option value="D"> DETENCION </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <div class="form-group">
            <label for="INICIO DE MEDIDA">INICIO</label>
            <input v-model="form.email" type="date" class="form-control" id="InicioMedida">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="FIN DE MEDIDA">FIN</label>
            <input v-model="form.email" type="date" class="form-control" id="FinMedida">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <h5 class="m-0">ACUERDO SEDE MINISTERIAL</h5><br>
        <div class="form-group">
            <label for="MECANISMOS SEDE">MECANISMOS SEDE</label>
            <select v-model="form.IDRol" id="MecanismosSede" type="text" class="form-control " name="MecanismosSede">
                <option value=""> Seleccione una opcion </option>
                <option value="L"> LIBERTAD </option>
                <option value="D"> DETENCION </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <div class="form-group">
            <label for="INICIO DE ACUERDO">INICIO</label>
            <input v-model="form.email" type="date" class="form-control" id="InicioAcuerdo">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="FIN DE ACUERDO">FIN</label>
            <input v-model="form.email" type="date" class="form-control" id="FinAcuerdo">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <h5 class="m-0">ESTATUS SEDE MINISTERIAL</h5><br>
        <div class="form-group">
            <label for="ESTATUS ">ESTATUS </label>
            <select v-model="form.IDRol" id="EstatusSede" type="text" class="form-control " name="EstatusSede">
                <option value=""> Seleccione una opcion </option>
                <option value="L"> LIBERTAD </option>
                <option value="D"> DETENCION </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <div class="form-group">
            <label for="FECHA ESTATUS SEDE">FECHA</label>
            <input v-model="form.email" type="date" class="form-control" id="FechaEstatusSede">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="CARPETA PROCESAL">CARPETA PROCESAL</label>
            <input v-model="form.email" type="text" class="form-control" id="CarpetaProcesal">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>
        
        <div class="form-group">
            <label for="AUDIENCIA INICIAL">AUDIENCIA INICIAL</label>
            <input v-model="form.email" type="text" class="form-control" id="AudienciaInicial">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="JUEZ DE CONTROL ">JUEZ DE CONTROL </label>
            <select v-model="form.IDRol" id="JuezControl" type="text" class="form-control " name="JuezControl">
                <option value=""> Seleccione una opcion </option>
                <option value="L"> LIBERTAD </option>
                <option value="D"> DETENCION </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <div class="form-group">
            <label for="DEFENSOR QUE CUBRE AUDIENCIA ">DEFENSOR QUE CUBRE AUDIENCIA </label>
            <select v-model="form.IDRol" id="DefensorAudiencia" type="text" class="form-control " name="DefensorAudiencia">
                <option value=""> Seleccione una opcion </option>
                <option value="1"> Administrador </option>
                <option value="2"> Director General </option>
                <option value="3"> Director Defensoria </option>
                <option value="4"> Director Asesoria </option>
                <option value="5"> Jefe de Asesorias </option>
                <option value="6"> Defensor </option>
                <option value="7"> Asesor </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <h5 class="m-0">ACUERDO REPATATORIO</h5> <br>
        <div class="form-group">
            <label for="INICIO DE ACUERDO">INICIO</label>
            <input v-model="form.email" type="date" class="form-control" id="InicioAcuerdoReparatorio">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="FIN DE ACUERDO">FIN</label>
            <input v-model="form.email" type="date" class="form-control" id="FinAcuerdoReparatorio">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="RESULTADO">RESULTADO</label>
            <select v-model="form.IDRol" id="ResultadoAcuerdoReparatorio" type="text" class="form-control " name="ResultadoAcuerdoReparatorio">
                <option value=""> Seleccione una opcion </option>
                <option value="L"> CUMPLIDO </option>
                <option value="D"> NO CUMPLIDO </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <div class="form-group">
            <label for="OBSERVACIONES">OBSERVACIONES</label>
            <textarea  v-model="form.email" class="form-control" id="ObservacionesAcuerdoReparatorio"></textarea>
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="FECHA DE FORMULACIÓN DE IMPUTACIÓN">FECHA DE FORMULACIÓN DE IMPUTACIÓN"</label>
            <input v-model="form.email" type="date" class="form-control" id="FechaFormulacionImputacion">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="FECHA DE VINCULACIÓN A PROCESO">FECHA DE VINCULACIÓN A PROCESO"</label>
            <input v-model="form.email" type="date" class="form-control" id="FechaVinculacionProceso">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="DELITO">DELITO </label>
            <select v-model="form.IDRol" id="DefensorAudiencia" type="text" class="form-control " name="DefensorAudiencia">
                <option value=""> Seleccione una opcion </option>
                <option value="1"> Administrador </option>
                <option value="2"> Director General </option>
                <option value="3"> Director Defensoria </option>
                <option value="4"> Director Asesoria </option>
                <option value="5"> Jefe de Asesorias </option>
                <option value="6"> Defensor </option>
                <option value="7"> Asesor </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <h5 class="m-0">INVESTIGACION COMPLEMENTARIA</h5> <br>
        <div class="form-group">
            <label for="INICIO DE INVESTIGACION COMPLEMENTARIA">INICIO</label>
            <input v-model="form.email" type="date" class="form-control" id="InicioIvenstigacionComplementaria">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="FIN DE INVESTIGACION COMPLEMENTARIA">FIN</label>
            <input v-model="form.email" type="date" class="form-control" id="FinIvenstigacionComplementaria">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <h5 class="m-0">PRORROGA DE INVESTIGACION COMPLEMENTARIA</h5> <br>
        <div class="form-group">
            <label for="INICIO DE PRORROGA DE INVESTIGACION COMPLEMENTARIA">INICIO PRORROGA</label>
            <input v-model="form.email" type="date" class="form-control" id="InicioProrrogaIvenstigacionComplementaria">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="FIN DE PRORROGA INVESTIGACION COMPLEMENTARIA">FIN PRORROGA</label>
            <input v-model="form.email" type="date" class="form-control" id="FinProrrogaIvenstigacionComplementaria">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <h5 class="m-0">MEDIDAS CAUTELARES</h5> <br>
        <div class="form-group">
            <label for="MEDIDA CAUTELAR">MEDIDA</label>
            <select v-model="form.IDRol" id="MedidaCautelar" type="text" class="form-control " name="MedidaCautelar">
                <option value=""> Seleccione una opcion </option>
                <option value="1"> Administrador </option>
                <option value="2"> Director General </option>
                <option value="3"> Director Defensoria </option>
                <option value="4"> Director Asesoria </option>
                <option value="5"> Jefe de Asesorias </option>
                <option value="6"> Defensor </option>
                <option value="7"> Asesor </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <div class="form-group">
            <label for="FECHA">FECHA</label>
            <input v-model="form.email" type="date" class="form-control" id="FechaMedidasCautelares">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>
    
        <div class="form-group">
            <label for="AUDIENCIA INTERMEDIA">AUDIENCIA INTERMEDIA</label>
            <input v-model="form.email" type="text" class="form-control" id="AudienciaIntermedia">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>
        

        <h5 class="m-0">SUSPENSIÓN CONDICIONAL DEL PROCESO</h5> <br>

        <div class="form-group">
            <label for="INICIO DE ACUERDO">INICIO</label>
            <input v-model="form.email" type="date" class="form-control" id="InicioSuspensionCondicional">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="FIN DE ACUERDO">FIN</label>
            <input v-model="form.email" type="date" class="form-control" id="FinSuspensionCondicional">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="RESULTADO">RESULTADO</label>
            <select v-model="form.IDRol" id="ResultadoSuspensionCondicional" type="text" class="form-control " name="ResultadoSuspensionCondicionalo">
                <option value=""> Seleccione una opcion </option>
                <option value="L"> CUMPLIDO </option>
                <option value="D"> NO CUMPLIDO </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <div class="form-group">
            <label for="OBSERVACIONES">OBSERVACIONES</label>
            <textarea  v-model="form.email" class="form-control" id="ObservacionesSuspensionCondicional"></textarea>
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="REPORTE DE CUMPLIMIENTO ">REPORTE DE CUMPLIMIENTO </label>
            <input v-model="form.email" type="text" class="form-control" id="ReporteCumplimientoSustensionCondicional">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <h5 class="m-0">PROCEDIMIENTO ABREVIADO	</h5> <br>

        <div class="form-group">
            <label for="FECHA">FECHA</label>
            <input v-model="form.email" type="date" class="form-control" id="FechaProcedimientoAbreviado">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>


        <div class="form-group">
            <label for="SENTENCIA">SENTENCIA </label>
            <input v-model="form.email" type="text" class="form-control" id="SentenciaProcedimientoAbreviado">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="JUICIO ">JUICIO </label>
            <input v-model="form.email" type="text" class="form-control" id="JUICIO">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="TRIBUNAL DE ENJUICIAMIENTO ">TRIBUNAL DE ENJUICIAMIENTO </label>
            <select v-model="form.IDRol" id="TribunalEnjuciamiento" type="text" class="form-control " name="TribunalEnjuciamiento">
                <option value=""> Seleccione una opcion </option>
                <option value="L"> CUMPLIDO </option>
                <option value="D"> NO CUMPLIDO </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        
        <div class="form-group">
            <label for="SENTENCIA JUICIO">SENTENCIA JUICIO</label>
            <input v-model="form.email" type="text" class="form-control" id="SentenciaJuicio">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="CONCLUSION ">CONCLUSION </label>
            <select v-model="form.IDRol" id="Conclusion" type="text" class="form-control " name="Conclusion">
                <option value=""> Seleccione una opcion </option>
                <option value="L"> CUMPLIDO </option>
                <option value="D"> NO CUMPLIDO </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <div class="form-group">
            <label for="FECHA">FECHA</label>
            <input v-model="form.email" type="date" class="form-control" id="FechaConclusion">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        
        <div class="form-group">
            <label for="VISITA CARCELARIA">VISITA CARCELARIA</label>
            <input v-model="form.email" type="text" class="form-control" id="VisitaCarcelaria">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>

        <div class="form-group">
            <label for="IMPUGNACION ">IMPUGNACION </label>
            <select v-model="form.IDRol" id="impugnacion" type="text" class="form-control " name="impugnacion">
                <option value=""> Seleccione una opcion </option>
                <option value="AP"> APELACIÓN </option>
                <option value="AMP"> AMPARO </option>
            </select>
            <div style="color: red;" v-if="form.errors.has('IDRol')" v-html="form.errors.get('IDRol')" />
        </div>

        <div class="form-group">
            <label for="FECHA">FECHA</label>
            <input v-model="form.email" type="date" class="form-control" id="FechaImpugnacion">
            <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>
















    </div>
</template>

<script lang="ts">
import { ref } from "vue";
import type { Header, Item } from "vue3-easy-data-table";
import Form from "vform";

export default {
    data() {
        return {
            idimputado: this.$route.params.inputado,
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            searchField: ref("name"),
            searchValue: ref(""),
            themeColor: "#AB0033",
            headers: [
                { text: "Fecha", value: "fecha" },
                { text: "Nota", value: "nota" },
                { text: "Opciones", value: "updated_at" },
            ],
            itemsPreeliminar: [],
            itemsAudienciaInicial: [],
            itemsVinculacionAProceso: [],
            itemsEtapaIntermedia: [],
            itemsjuicioOral: [],
            form: new Form({
                id: "",
                name: "",
                email: "",
                password: "",
                remember_token: "",
                email_verified_at: "",
                created_at: "",
                updated_at: "",
            }),
            nota: new Form({
                texto: "",
                idimputado: 1,
                idEtapa: 1,
            }),
            datosEtapa: new Form({
                idimputado: 1,
                idEtapa: 1,
            }),
            dmasc: new Form({
                idimputado: 1,
                idEtapa: 1,
            }),
            estados: [],
            claseEstados: ["", "", "", "", ""],
        };
    },
    mounted() {
        this.getList();
        this.getEstadoEtapas();
    },
    methods: {
        abrirModalRegistro() {
            console.log("Se ha abierto el modal");
            this.form.reset();
            this.form.clear();
        },
        getList() {
            this.axios
                .get("/bitacora/notas/" + this.idimputado)
                .then((response) => {
                    this.itemsPreeliminar = response.data[0];
                    this.itemsAudienciaInicial = response.data[1];
                    this.itemsVinculacionAProceso = response.data[2];
                    this.itemsEtapaIntermedia = response.data[3];
                    this.itemsjuicioOral = response.data[4];
                });
        },
        getEstadoEtapas() {
            this.axios
                .get("/etapa/imputado/" + this.idimputado)
                .then((response) => {
                    this.estados = response.data;
                    for (let i = 0; i < this.estados.length; i++) {
                        if (this.estados[i] == 0)
                            this.claseEstados[i] =
                                "card collapsed-card card-secondary";
                        if (this.estados[i] == 1)
                            this.claseEstados[i] = "card card-primary";
                        if (this.estados[i] == 2)
                            this.claseEstados[i] =
                                "card collapsed-card card-success";
                    }
                });
        },
        async registrarNota(idEtapa) {
            this.nota.idimputado = Number(this.idimputado);
            this.nota.idEtapa = Number(idEtapa);
            await this.axios
                .post("/bitacora", this.nota)
                .then((response) => {
                    this.getList();
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        async finalizarEtapa(idEtapa) {
            this.datosEtapa.idimputado = Number(this.idimputado);
            this.datosEtapa.idEtapa = idEtapa;
            await this.datosEtapa.post('/etapa/finalizar').then((response) => {
                this.getEstadoEtapas();
          }).catch(error => {
              console.log(error);
          })
        
      },
      async masc(idEtapa) {
        console.log("a")
        this.dmasc.idimputado = Number(this.idimputado);
        this.dmasc.idEtapa = idEtapa;
        await this.dmasc.post('/etapa/masc').then((response) => {
            this.getEstadoEtapas();
      }).catch(error => {
          console.log(error);
      })
    
  }
           
    },
};
</script>
