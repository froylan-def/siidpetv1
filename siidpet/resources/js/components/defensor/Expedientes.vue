<template>
    <!-- Content Header (Page header) -->
    <div class="content-header mt-3">
        <div class="d-flex justify-content-between align-items-center ">
            <h1 class="h4">Expedientes</h1>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="">
                        <a v-if="this.rolUsuario == 1 || this.rolUsuario == 5" class="btn btn-primary"
                            data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false"
                            aria-controls="collapseExample2">
                            <i class="fa-solid fa-filter"></i> Filtrar
                        </a>
                        <a @click="this.$router.push('/expedientes')" class="btn btn-secondary ml-1"
                            data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                            aria-controls="collapseExample">
                            <i class="fa-solid fa-magnifying-glass"></i> Buscar
                        </a>
                    </div>
                    <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarExpediente"
                        @click="abrirModalRegistro">
                        <i class="fa-solid fa-plus"></i> Crear nuevo expediente
                    </button>
                </div>


                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">

                            <div class="collapse" id="collapseExample2">
                                <div class="card card-body shadow" style="border-radius: 0.7rem">
                                    <h5> Filtrado expedientes </h5>

                                    <div class="row" v-if="this.rolUsuario == 5">

                                        <div class="col-xl-4 col-sm-12">
                                            <div class="form-group ">
                                                <label for="Apellido Paterno">Municipio</label>
                                                <v-select v-model="this.busqueda.municipio"
                                                    :reduce="(option) => option.id" :options="municipios"
                                                    @update:model-value="seleccionarMunicipio()">
                                                </v-select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-12">
                                            <div class="form-group ">
                                                <label for="Apellido Materno">Defensor</label>
                                                <v-select v-model="this.busqueda.defensor"
                                                    :reduce="(option) => option.id" :options="defensores"
                                                    @update:model-value="seleccionarDefensor()">
                                                </v-select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-12 mt-1">
                                            <button class="btn btn-primary w-100 mt-4" @click="realizarBusqueda">
                                                <i class="fa-solid fa-search"></i> Buscar
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row" v-else>
                                        <div class="col-xl-3 col-sm-12">
                                            <label for="Nombre del usuario">Coordinación</label>
                                            <v-select v-model="this.busqueda.coordinacion"
                                                :reduce="(option) => option.id" :options="coordinaciones"
                                                @update:model-value="seleccionarCoordinacion()">
                                            </v-select>
                                        </div>
                                        <div class="col-xl-3 col-sm-12">
                                            <div class="form-group ">
                                                <label for="Apellido Paterno">Municipio</label>
                                                <v-select v-model="this.busqueda.municipio"
                                                    :reduce="(option) => option.id" :options="municipios"
                                                    @update:model-value="seleccionarMunicipio()">
                                                </v-select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-12">
                                            <div class="form-group ">
                                                <label for="Apellido Materno">Defensor</label>
                                                <v-select v-model="this.busqueda.defensor"
                                                    :reduce="(option) => option.id" :options="defensores"
                                                    @update:model-value="seleccionarDefensor()">
                                                </v-select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-12 mt-1">
                                            <button class="btn btn-primary w-100 mt-4" @click="realizarBusqueda">
                                                <i class="fa-solid fa-search"></i> Buscar
                                            </button>
                                        </div>
                                    </div>



                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body" style="border-radius: 0.7rem">
                                    <h5> Busqueda de expedientes </h5>
                                    <div class="row mb-3">
                                        <div class="col-6 ">
                                            <label for="municipio" class="form-label">Buscar</label>
                                            <select class="custom-select " v-model="searchField">
                                                <option selected disabled>Seleccione una opcion</option>
                                                <option value="ugi.nombre">Ugi</option>
                                                <option value="nuc">Carpeta de Inv.</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="municipio" class="form-label"> Valor </label>
                                            <input class="form-control  border-width-2 " v-model="searchValue"
                                                placeholder="Escriba lo que quiera buscar" type="search" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <EasyDataTable  buttons-pagination :headers="filteredHeaders" :items="items" :search-field="searchField"
                    :search-value="searchValue" :rows-per-page="10" rowsPerPageMessage="Filas por página:"
                    emptyMessage="No hay datos disponibles" alternating table-class-name="customize-table"
                    theme-color="var(--primary-color)">
                    <template #item-operation="item">
                        <div class="operation-wrapper">
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-gear"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item btn " @click="irADetalles(item)">
                                        <i class="fa-regular fa-eye"></i> Detalles
                                    </a>
                                    <a class="dropdown-item btn " @click="actualizarExpediente(item)">
                                        <i class="fa-regular fa-pen-to-square "></i> Editar
                                    </a>
                                    <a data-toggle="modal" class="dropdown-item btn"
                                        data-target="#modalVerDetallesExpediente" @click="obtenerExpediente(item.id)">
                                        <i class="fa-solid fa-circle-info"></i> ver
                                    </a>
                                    <a v-if="item.activo == 0 && (this.rolUsuario == 1 || this.rolUsuario == 5)"
                                        class="dropdown-item btn" @click="desactivar(item)">
                                        <i class="fa-solid fa-check"></i> Activar
                                    </a>
                                    <a class="dropdown-item btn" @click="desactivar(item)"
                                        v-if="item.activo == 1 && (this.rolUsuario == 1 || this.rolUsuario == 5)">
                                        <i class="fa-solid fa-ban"></i> Desactivar
                                    </a>
                                    <a data-toggle="modal" class="dropdown-item btn" data-target="#modalCambiarDefensor"
                                        @click="cambiarDefensor(item)" v-if="this.rolUsuario == 1">
                                        <i class="fa-solid fa-arrows-turn-to-dots"></i> Cambiar defensor
                                    </a>
                                    <a class="dropdown-item btn" @click="eliminar(item.id)" v-if="this.rolUsuario == 1">
                                        <i class="fa-solid fa-trash"></i> Eliminar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </template>

                    <template #item-imputado="item">
                        {{ this.obtenerNombresImputados(item) }}
                    </template>

                    <template #item-defensor="item" v-if="this.rolUsuario != 6">
                        {{ this.obtenerNombreDefensor(item) }}
                    </template>

                    <template #item-activo="item">
                        <span v-if="item.activo === 1"> <span class="badge badge-success">Activo</span> </span>
                        <span v-if="item.activo === 0"> <span class="badge badge-danger">Desactivado</span> </span>
                    </template>
                </EasyDataTable>




            </div>
        </div>
    </div>

    <div class="modal fade " id="modalVerDetallesExpediente" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Expediente {{ this.expediente.nuc }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <!-- Columna 3 -->




                    <h6 class="text-primary">Imputado</h6>

                    <ul v-if="this.imputados.length === 0" style="font-size: smaller; list-style: none;" class="pl-0">
                        <li>No hay procesados registrados</li>
                    </ul>

                    <ul v-else style="font-size: smaller; list-style: none;" v-for="imputado in this.imputados"
                        :key="imputado.nombres" class="pl-0">
                        <li>
                            {{ imputado.nombres }}
                            {{ imputado.apellido_paterno }}
                            {{ imputado.apellido_materno }}
                        </li>
                    </ul>





                    <h6 class="text-primary ">Víctimas</h6>
                    <ul v-if="this.victimas.length == 0" style="font-size: smaller; list-style: none;" class="pl-0">
                        <li>No hay victimas registradas</li>
                    </ul>
                    <ul v-for="victima in this.victimas" :key="victima.nombres"
                        style="font-size: smaller; list-style: none;" class="pl-0">
                        <li>
                            {{ victima.nombres }}
                            {{ victima.apellido_paterno }}
                            {{ victima.apellido_materno }}
                        </li>
                    </ul>





                    <h6 class="text-primary">Delito</h6>
                    <ul v-if="this.delitos.length === 0" style="font-size: smaller; list-style: none;" class="pl-0">
                        <li>No hay delitos registrados</li>
                    </ul>
                    <ul v-for="delito in this.delitos" :key="delitos.id" style="font-size: smaller; list-style: none;"
                        class="pl-0">
                        <li>
                            {{ delito.nombre }}
                        </li>
                    </ul>




                    <h6 class="text-primary">Carpeta Procesal </h6>
                    <ul v-if="this.expediente.carpeta_procesal === '' || this.expediente.carpeta_procesal === null"
                        style="font-size: smaller; list-style: none;" class="pl-0">
                        <li>No hay C.P. registrada</li>
                    </ul>

                    <ul style="font-size: smaller; list-style: none;" class="pl-0">
                        <li>
                            {{ this.expediente.carpeta_procesal }}
                        </li>
                    </ul>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                </div>




            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAgregarExpediente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form @submit.prevent="actualizarExpedienteCheck === false ? registrarExpediente : editarExpediente">
                    <div class="modal-header">
                        <h5 v-if="actualizarExpedienteCheck" class="modal-title" id="modalAgregarExpediente"> Actualizar
                            expediente </h5>
                        <h5 v-else class="modal-title" id="modalAgregarExpediente"> Nuevo expediente </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="audiencia_inicial"> UGI </label>
                            <v-select v-model="this.form.id_ugi" :reduce="(option) => option.id" :options="this.ugis"
                                placeholder="Seleccione una opcion">
                            </v-select>
                            <div style="color: red;" v-if="form.errors.has('id_ugi')"
                                v-html="form.errors.get('id_ugi')" />
                        </div>
                        <div class="form-group">
                            <label for="nuc">Carpeta de investigación</label>
                            <input v-model="form.nuc" type="text" class="form-control" id="nuc"
                                aria-describedby="emailHelp" placeholder="Carpeta de investigación">
                            <div style="color: red;" v-if="form.errors.has('nuc')" v-html="form.errors.get('nuc')" />
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fas fa-times"></i> Cancelar
                        </button>

                        <button v-if="actualizarExpedienteCheck" :disabled="form.busy" class="btn btn-warning"
                            @click="editarExpediente">
                            <i class="fas fa-save"></i> Actualizar
                        </button>

                        <button v-else :disabled="form.busy" class="btn btn-success" @click="registrarExpediente">
                            <i class="fas fa-save"></i> Guardar
                        </button>


                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalCambiarDefensor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title"> Cambiar defensor </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nuc"> Defensor </label>

                        <v-select v-model="this.form.id_defensor" :reduce="(option) => option.id"
                            :options="defensoresOpciones">
                        </v-select>




                        <div style="color: red;" v-if="form.errors.has('id_defensor')"
                            v-html="form.errors.get('id_defensor')" />
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cancelar
                    </button>

                    <button class="btn btn-success" @click="cambiarDefensorExpediente">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { ref } from "vue";
import Form from 'vform'
import Swal from 'sweetalert2'
import 'vue3-easy-data-table/dist/style.css';
export default {
    data() {
        return {
            id_defensor: ref(''),
            ugis: ref([]),
            searchField: ref("nuc"),
            searchValue: ref(""),
            datos: [
                { text: "CI", value: "nuc", sortable: true },
                { text: "Ugi", value: "ugi.nombre", sortable: true, },
                { text: "Imputado", value: "imputado" },
                { text: "Coordinación", value: "defensor.coordinacion.nombre" },
                { text: "Municipio", value: "defensor.municipio.nombre" },
                { text: "Defensor", value: "defensor"},
                { text: "Activo", value: "activo" },
                // { text: "Estatus", value: "status" },
                { text: "Acciones", value: "operation" },
            ],
            items: [],
            form: new Form({
                fecha_vinculacion_proceso: null,
                flagrancia: null,
                foja: null,
                id: null,
                id_acuerdo_reparatorio: null,
                id_acuerdo_sede_ministerial: null,
                id_asignacion_medidas: null,
                id_conclusion: null,
                id_defensor: null,
                id_defensor_audiencia: null,
                id_delito: null,
                id_delito_proceso: null,
                id_entrevista: null,
                id_flagrancia: null,
                id_impugnacion: null,
                id_imputado: null,
                id_investigacion_complementaria: null,
                id_juez_control: null,
                id_medida_cautelar: null,
                id_orden_aprencion: null,
                id_procedimiento_abreviado: null,
                id_prorroga_plazo: null,
                id_suspencion_condicional_proceso: null,
                id_tribunal_enjuiciamiento: null,
                id_ugi: null,
                id_victima: null,
                impugnacion: null,
                imputado: null,
                investigacioncomplementaria: null,
                juez: null,
                juicio: null,
                medidacautelar: null,
                nuc: null,
                ordenaprencion: null,
                procedimientoabreviado: null,
                prorrogaplazoinvestigacioncomplementaria: null,
                sentencia_juicio: null,
                suspencioncondicionalproceso: null,
                tribunalenjuiciamiento: null,
                ugi: null,
                updated_at: null,
                victima: null,
                visita_carcelaria: null,
                activo: 1,
            }),
            ugiOptions: [],
            actualizarExpedienteCheck: ref(false),
            coordinaciones: ref([{
                id: -1,
                label: "Todos"
            }]),
            municipios: ref([{
                id: -1,
                label: "Todos"
            }]),
            defensores: ref([{
                id: -1,
                label: "Todos"
            }]),
            busqueda: {
                coordinacion: ref(-1),
                defensor: ref(-1),
                municipio: ref(-1),
            },

            imputados: [],
            victimas: [],
            delitos: [],
            expediente: {
                foja: '',
                id_ugi: '',
                nuc: '',
            },
            defensoresOpciones: ref([]),
            coordinacion: ref(window.coordinacion),
            rolUsuario: window.rol,
            idUsario: window.id_usuario,
        }
    },
    computed: {
        filteredHeaders() {
            return this.datos.filter(header =>
                this.rolUsuario != "6" || (header.value !== 'defensor' && header.value !== 'activo' && header.value !== 'defensor.coordinacion.nombre' && header.value !== "defensor.municipio.nombre" )
            );
        }
    },
    async created() {
        if (this.rolUsuario == "5") {
            this.busqueda.coordinacion = this.coordinacion;
        }

        await this.obtenerInformacionDefensor();
        this.obtenerExpedientes();
        this.obtenerUgis();
        this.obtenerDefensores();

        this.obtenerDatosDeBusqueda();
        this.seleccionarCoordinacion();

    },
    methods: {
        async obtenerInformacionDefensor() {
            try {
                const response = await this.axios.get('/obtenerdefensorporidusuario/' + this.idUsario);
                this.id_defensor = response.data.defensor[0].id;

            } catch (error) {
                console.error('Error fetching ocupaciones:', error);
            }

        },
        async cambiarDefensorExpediente() {
            await this.form.put('/expediente/' + this.form.id, this.form).then(() => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Expediente actualizado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#modalCambiarDefensor').modal('hide');
                this.obtenerExpedientes();
            }).catch(error => {
                console.log(error);
            });
        },
        async obtenerDefensores() {
            try {
                const response = await this.axios.get('/defensor');
                this.defensoresOpciones = response.data.map(defensor => ({
                    id: defensor.id,
                    label: defensor.user.name + " " + defensor.user.fathername + " " + defensor.user.mothername
                }));
            } catch (error) {
                console.error('Error fetching ocupaciones:', error);
            }
        },
        async obtenerExpediente(id) {
            await this.axios.get('/expediente/' + id).then((response) => {
                this.expediente = response.data.expediente;
            });
            this.imputados = [];
            await this.axios.get('/imputadosPorExpediente/' + id + '/').then((response) => {
                this.imputados = response.data;
            })
            this.victimas = [];
            await this.axios.get('/victimasPorExpediente/' + id + '/').then((response) => {
                this.victimas = response.data;
            })
            this.delitos = [];
            await this.axios.get('/delitosPorExpediente/' + id + '/').then((response) => {
                this.delitos = response.data;
            })
        },

        seleccionarDefensor() {
            if (this.busqueda.defensor === null) {
                this.busqueda.defensor = -1;
            }
        },
        async realizarBusqueda() {
            const coordinacion = this.busqueda.coordinacion === -1 ? null : [this.busqueda.coordinacion];
            const municipio = this.busqueda.municipio === -1 ? null : [this.busqueda.municipio];
            const defensor = this.busqueda.defensor === -1 ? null : [this.busqueda.defensor];
            try {
                const filtros = {
                    id_coordinacion: coordinacion,
                    id_municipio: municipio,
                    id_defensor: defensor,
                }
                const response = await this.axios.post('/busquedaconfiltros', filtros);
                const resultadoDeBusqueda = response.data;
                this.items = resultadoDeBusqueda;
            } catch (error) {
                console.error('Error fetching ocupaciones:', error);
            }
        },
        async seleccionarMunicipio() {
            if (this.busqueda.municipio === null) {
                this.busqueda.municipio = -1;
            }
            this.busqueda.defensor = -1;
            this.defensores = [{
                id: -1,
                label: "Todos"
            }];
            try {
                const response = await this.axios.get('/obtenerDefensoresMunicipio/' + this.busqueda.municipio);
                const informacionAdicional = response.data.map(defensor => ({
                    id: defensor.id,
                    label: defensor.user.name + " " + defensor.user.fathername + "  " + defensor.user.mothername
                }));
                this.defensores.splice(2, 0, ...informacionAdicional);
            } catch (error) {
                console.error('Error fetching ocupaciones:', error);
            }
        },
        async seleccionarCoordinacion() {
            if (this.busqueda.coordinacion === null && this.rolUsuario != "5") {
                this.busqueda.coordinacion = -1;
            }
            if (this.busqueda.coordinacion === null && this.rolUsuario == "5") {
                this.busqueda.coordinacion = this.coordinacion;
            }
            this.busqueda.municipio = -1;
            this.busqueda.defensor = -1;
            this.municipios = [{
                id: -1,
                label: "Todos"
            }];
            try {
                const response = await this.axios.get('/coordinacionMunicipio/' + this.busqueda.coordinacion);
                const informacionAdicional = response.data.map(municipio => ({
                    id: municipio.municipio.id,
                    label: municipio.municipio.nombre
                }));
                this.municipios.splice(2, 0, ...informacionAdicional);
            } catch (error) {
                console.error('Error fetching ocupaciones:', error);
            }
        },

        async obtenerDatosDeBusqueda() {
            try {
                if (this.rolUsuario == '5') {

                    const response = await this.axios.get('/coordinacion/' + this.coordinacion);

                    this.coordinaciones = await [{
                        id: response.data.coordinacion.id,
                        label: response.data.coordinacion.nombre
                    }];

                    this.busqueda.coordinacion = this.coordinacion;


                } else {
                    const response = await this.axios.get('/coordinacion');
                    const informacionAdicional = response.data.map(coordinacion => ({
                        id: coordinacion.id,
                        label: coordinacion.nombre
                    }));
                    await this.coordinaciones.splice(2, 0, ...informacionAdicional);
                }
            } catch (error) {
                console.error('Error fetching ocupaciones:', error);
            }
        },
        obtenerNombreDefensor(item) {
            if (item.defensor !== null || item.defensor !== "") {
                return `${item.defensor.user.name} ${item.defensor.user.fathername} ${item.defensor.user.mothername}`;
            } else {
                return "-";
            }
        },
        obtenerNombresImputados(item) {
            if (item.imputados !== null) {
                return item.imputados.map(imputado => `${imputado.nombres} ${imputado.apellido_paterno} ${imputado.apellido_materno}`).join(', ');
            } else {
                return "-";
            }
        },
        async editarExpediente() {
            await this.form.put('/expediente/' + this.form.id, this.form).then((response) => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Expediente actualizado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#modalAgregarExpediente').modal('hide');
                this.obtenerExpedientes();
            }).catch(error => {
                console.log(error);
            });
        },
        actualizarExpediente(expediente) {
            $('#modalAgregarExpediente').modal('show');
            this.form.fill(expediente);
            this.actualizarExpedienteCheck = true;
        },

        cambiarDefensor(expediente) {
            this.form.fill(expediente);
        },


        async obtenerUgis() {
            try {
                const response = await this.axios.get('/ugi');
                this.ugis = response.data.map(ugi => ({
                    id: ugi.id,
                    label: ugi.nombre
                }));
            } catch (error) {
                console.error('Error fetching ocupaciones:', error);
            }
        },
        abrirModalRegistro() {
            this.actualizarExpedienteCheck = false;
            this.form.reset();
            this.form.clear();
        },
        async registrarExpediente() {


            this.form.id_defensor = await this.id_defensor;
            await this.form.post('/expediente').then((response) => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Expediente guardado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                })
                this.obtenerExpedientes();
            }).catch(error => {
                console.log(error);
            });
            $('#modalAgregarExpediente').modal('hide');


        },
        obtenerExpedientes() {
            this.axios.get('/expediente').then((response) => {
                this.items = response.data;
            })
        },
        async irADetalles(item) {
            this.$router.push('/expedientes/' + item.id);
        },
        eliminar(id) {
            Swal.fire({
                title: '¿Está seguro de eliminar permanentemente este registro?',
                showDenyButton: true,
                confirmButtonText: 'Aceptar',
                denyButtonText: `Cancelar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.axios.delete('/expediente/' + id).then((response) => {


                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Registro eliminado con éxito',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        this.obtenerExpedientes();
                    }).catch(error => {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Error al eliminar',
                            text: "No se puede eliminar el expediente debido a que tiene datos anexados. Primero eliminelos e intente de nuevo",
                            showConfirmButton: true,
                        })
                    });
                } else if (result.isDenied) {
                    Swal.fire('No se guardaron los cambios', '', 'info')
                }
            })
        },

        desactivar(item) {
            this.form.fill(item);
            if (this.form.activo == 1) {
                this.form.activo = 0;
            } else {
                this.form.activo = 1;
            }
            Swal.fire({
                title: '¿Está seguro de cambiar los accesos este Registro?',
                showDenyButton: true,
                confirmButtonText: 'Aceptar',
                denyButtonText: `Cancelar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.form.put('/expediente/' + item.id).then((response) => {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Expediente actualizado con éxito',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        this.obtenerExpedientes();
                    }).catch(error => {
                        console.log(error);
                    });
                } else if (result.isDenied) {
                    Swal.fire('No se guardaron los cambios', '', 'info')
                }
            })

        },


    }
}
</script>
<style>
.customize-table {
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

:root {
    --easy-table-border: 2px solid #ddd;
    --easy-table-row-border: 1px solid #ddd;
    --easy-table-header-font-size: 15px;
    --easy-table-header-item-padding: 10px 25px;
    --easy-table-body-item-padding: 25px 20px;
    --easy-table-header-background-color: var(--bs-secondary);
    --easy-table-header-font-color: white;
    --easy-table-body-row-font-size: 15px;
}
</style>
