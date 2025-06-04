<template>
    <div class="content-header mt-3">
        <div class="d-flex justify-content-between align-items-center ">
            <h1 class="h4">Calendario</h1>
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
                            <i class="fa-solid fa-filter"></i> Busqueda
                        </a>
                    </div>

                    <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarEvento"
                        @click="abrirModalRegistro">
                        <i class="fa-solid fa-plus"></i> Crear nuevo evento
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
                                            <button class="btn btn-primary w-100 mt-4" @click="obtenerEventos()">
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
                                            <button class="btn btn-primary w-100 mt-4" @click="obtenerEventos()">
                                                <i class="fa-solid fa-search"></i> Buscar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 0.7rem">
                    <div class="card-body p-0">
                        <FullCalendar :options="calendarOptions">
                            <template v-slot:eventContent='arg'>
                                <p class="my-0 ml-1"> <b> {{ arg.event.title }} </b> </p>
                                <span class="badge badge-pill badge-light my-1 ml-1">{{ arg.event.extendedProps.defensor
                                    }} </span>
                            </template>
                        </FullCalendar>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalAgregarEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" v-if="visualizarExpedienteCheck && actualizarExpedienteCheck">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="tituloEvento"> {{ this.form.evento }} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong><i class="fas fa-align-left"></i> Descripción:</strong> {{ this.form.descripcion }}
                        </p>
                        <p v-if="this.agregarFechaFin"><strong><i class="fas fa-calendar-alt"></i> Inicio:</strong> {{
                            this.formatearFecha(this.form.fecha_inicio, true)
                            }} </p>
                        <p v-if="this.agregarFechaFin"><strong><i class="fas fa-calendar-alt"></i> Fin:</strong> {{
                            this.formatearFecha(this.form.fecha_fin, false)
                            }}
                        </p>
                        <p v-if="!this.agregarFechaFin"><strong><i class="fas fa-calendar-alt"></i> Fecha:</strong> {{
                            this.formatearFecha(this.form.fecha_inicio, true)
                            }} </p>
                        <p>
                            <strong><i class="fas fa-user"></i> Defensor:</strong>
                            {{ this.form.nombre_defensor }}
                        </p>
                    </div>
                    <div class="modal-footer">

                        <button v-if="this.rolUsuario == 1 || this.rolUsuario == 5" class="btn btn-danger" @click="eliminarEvento">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>


                        <button class="btn btn-info" @click="cambiarModoEdicion">
                            <i class="fas fa-save"></i> Editar
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <div class="modal-content" v-else>
                    <form @submit.prevent="actualizarExpedienteCheck === false ? registrarEvento : editarEvento">
                        <div class="modal-header">
                            <h5 v-if="actualizarExpedienteCheck" class="modal-title" id="modalAgregarEvento"> Actualizar
                                evento
                            </h5>
                            <h5 v-else class="modal-title" id="modalAgregarEvento"> Agregar evento </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Titulo</label>
                                <input v-model="form.evento" type="text" class="form-control" id="titulo"
                                    aria-describedby="emailHelp" placeholder="Titulo del evento">
                                <span class="alinear-derecha" style="font-size: 10px">
                                    {{ 255 - this.form.evento.length }} Restante
                                </span>
                                <div style="color: red;" v-if="form.errors.has('evento')"
                                    v-html="form.errors.get('evento')" />
                            </div>
                            <div class="form-group">

                                <label>Descripción</label>

                                <textarea rows="4" v-model="form.descripcion" type="text" class="form-control"
                                    id="titulo" aria-describedby="emailHelp" placeholder="Descripcion del evento">
                                </textarea>

                                <span class="alinear-derecha" style="font-size: 10px">
                                    {{ 255 - this.form.descripcion.length }} Restante
                                </span>


                                <div style="color: red;" v-if="form.errors.has('descripcion')"
                                    v-html="form.errors.get('descripcion')" />
                            
                            </div>
                            <div class="form-group">
                                <label>Fecha inicio</label>
                                <input v-model="form.fecha_inicio" type="date" class="form-control" id="titulo"
                                    aria-describedby="emailHelp" placeholder="Descripcion del evento">
                                <div style="color: red;" v-if="form.errors.has('fecha_inicio')"
                                    v-html="form.errors.get('fecha_inicio')" />
                            </div>

                            <div class="form-group">
                                <input type="checkbox" v-model="agregarFechaFin">
                                Agregar fecha de finalización
                                </input>
                            </div>

                            <div class="form-group" v-if="agregarFechaFin">
                                <label>Fecha fin</label>
                                <input v-model="form.fecha_fin" type="date" class="form-control" id="titulo"
                                    placeholder="Descripcion del evento">
                                <div style="color: red;" v-if="form.errors.has('fecha_fin')"
                                    v-html="form.errors.get('fecha_fin')" />
                            </div>
                            
                            <div class="form-group" v-if="this.rolUsuario == 1 || this.rolUsuario == 5">
                                <label for="nuc"> Defensor </label>
                                <v-select v-model="this.form.id_defensor" :reduce="(option) => option.id"
                                    :options="defensoresOpciones">
                                </v-select>
                                <div style="color: red;" v-if="form.errors.has('id_defensor')"
                                    v-html="form.errors.get('id_defensor')" />
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button class="btn btn-info" @click="regresarNavegacion">
                                <i class="fas fa-arrow-left"></i> Regresar
                            </button>

                            <button v-if="actualizarExpedienteCheck" :disabled="form.busy" class="btn btn-primary"
                                @click="editarEvento">
                                <i class="fas fa-save"></i> Actualizar
                            </button>

                            <button v-else :disabled="form.busy" class="btn btn-success" @click="registrarEvento">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="fas fa-times"></i> Cancelar
                            </button>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { ref, reactive } from "vue";
import Form from 'vform'
import Swal from 'sweetalert2'
import esLocale from '@fullcalendar/core/locales/es';
import interactionPlugin from '@fullcalendar/interaction';
import dayGridPlugin from '@fullcalendar/daygrid';
import FullCalendar from '@fullcalendar/vue3';

export default {
    components: {
        FullCalendar: FullCalendar
    },
    data() {
        return {
            actualizarExpedienteCheck: ref(false),
            visualizarExpedienteCheck: ref(true),
            date: new Date(),
            calendarioRef: ref(null),
            events: reactive([]),
            form: new Form({
                id: "",
                evento: "",
                descripcion: "",
                fecha_inicio: "",
                fecha_fin: "",
                id_defensor: "",
                nombre_defensor: "",
            }),
            calendarOptions: {
                plugins: [dayGridPlugin, interactionPlugin],
                initialView: 'dayGridMonth',
                editable: true,
                droppable: true,
                selectable: true,
                locale: esLocale,
                firstDay: 1,
                headerToolbar: {
                    left: "title",
                },
                events: [],
                dateClick: this.abrirModalRegistro,
                eventClick: this.actualizarExpediente,
                eventChange: this.handleEventChange
            },
            defensoresOpciones: ref([]),
            agregarFechaFin: false,
            coordinacion: ref(window.coordinacion),
            rolUsuario: ref(window.rol),
            idUsario: ref(window.id_usuario),
            busqueda: {
                coordinacion: ref(-1),
                defensor: ref(-1),
                municipio: ref(-1),
            },
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

        }
    },
    mounted() {
        if (this.rolUsuario == "5") {
            this.busqueda.coordinacion = this.coordinacion;
        }else{
            this.busqueda.coordinacion = null;
        }
        this.calendarOptions.events = this.events;
        this.obtenerEventos();
        this.obtenerDefensores();

        this.obtenerDatosDeBusqueda();
        this.seleccionarCoordinacion();
    },
    methods: {

        eliminarEvento(){
            console.log("Se ha borrado documento");
            console.log("Id del evento " + this.form.id);
            
            Swal.fire({
                title: '¿Está seguro de eliminar permanentemente este evento?',
                showDenyButton: true,
                confirmButtonText: 'Aceptar',
                denyButtonText: `Cancelar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.axios.delete('/calendarioapi/' + this.form.id).then((response) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Evento eliminado con éxito',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#modalAgregarEvento').modal('hide');
                        this.obtenerEventos();
                    }).catch(error => {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Error al eliminar',
                            text: "No se ha podido eliminar el evento",
                            showConfirmButton: true,
                        })
                    });
                } else if (result.isDenied) {
                    Swal.fire('No se guardaron los cambios', '', 'info')
                }
            })
                
        },
        async obtenerEventos() {
            if (this.busqueda.coordinacion !=  null ) {
                const coordinacion = this.busqueda.coordinacion === -1 ? null : [this.busqueda.coordinacion];
                const municipio = this.busqueda.municipio === -1 ? null : [this.busqueda.municipio];
                const defensor = this.busqueda.defensor === -1 ? null : [this.busqueda.defensor];
                try {
                    const filtros = {
                        id_coordinacion: coordinacion,
                        id_municipio: municipio,
                        id_defensor: defensor,
                    }
                    const response = await this.axios.post('/busquedaeventosconfiltros', filtros);
                    const _this = this;
                    _this.events = [];
                    this.calendarOptions.events = [];
                    response.data.forEach(function (element) {
                        _this.events.push({
                            id: element.id,
                            title: element.evento,
                            description: element.descripcion,
                            start: element.fecha_inicio,
                            end: element.fecha_fin,
                            id_defensor: element.id_defensor,
                            defensor: element.defensor.user.name + " " + element.defensor.user.fathername + " " + element.defensor.user.mothername,
                            backgroundColor: "#" + element.defensor.coordinacion.color,
                            borderColor: "#" + element.defensor.coordinacion.color,
                        });
                    });

                    this.calendarOptions.events = _this.events;

                } catch (error) {
                    console.error('Error fetching eventos:', error);
                }

            } else {
                try {
                    let response = "";
                    response = await this.axios.get('/calendarioapi');
                    const _this = this;
                    response.data.forEach(function (element) {
                        _this.events.push({
                            id: element.id,
                            title: element.evento,
                            description: element.descripcion,
                            start: element.fecha_inicio,
                            end: element.fecha_fin,
                            id_defensor: element.id_defensor,
                            defensor: element.defensor.user.name + " " + element.defensor.user.fathername + " " + element.defensor.user.mothername,
                            backgroundColor: "#" + element.defensor.coordinacion.color,
                            borderColor: "#" + element.defensor.coordinacion.color,
                        });
                    });
                } catch (error) {
                    console.error('Error fetching eventos:', error);
                }

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
        seleccionarDefensor() {
            if (this.busqueda.defensor === null) {
                this.busqueda.defensor = -1;
            }
        },

        async obtenerNombreDefensor() {
            let defensor = "";
            try {
                const response = await this.axios.get('/defensor/' + this.form.id_defensor);
                defensor = response.data.defensor.user.name + " " + response.data.defensor.user.fathername + " " + response.data.defensor.user.mothername;
                this.form.nombre_defensor = defensor;
            } catch (error) {
                console.error('Error fetching ocupaciones:', error);
            }
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
        cambiarModoEdicion() {
            this.visualizarExpedienteCheck = false;
            let fechaAdecuada = new Date(this.form.fecha_fin);
            fechaAdecuada.setDate(fechaAdecuada.getDate() - 1);
            this.form.fecha_fin = fechaAdecuada.toISOString().split("T")[0];
        },
        async editarEvento() {
            if (!this.agregarFechaFin) {
                this.form.fecha_fin = "";
            } else {
                if (this.form.fecha_fin != "") {
                    let fechaAdecuada = new Date(this.form.fecha_fin);
                    fechaAdecuada.setDate(fechaAdecuada.getDate() + 1);
                    this.form.fecha_fin = fechaAdecuada.toISOString().split("T")[0];
                }
            }
            await this.form.put('/calendarioapi/' + this.form.id, this.form).then(() => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Evento actualizado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#modalAgregarEvento').modal('hide');
                this.obtenerEventos();
            }).catch(error => {
                console.log(error);
            });
        },
        async registrarEvento() {
            await this.form.post('/calendarioapi').then((response) => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Evento guardado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                })
                this.obtenerEventos();
                $('#modalAgregarEvento').modal('hide');
            }).catch(error => {
                console.log(error);
            });
        },
        formatearFecha(fechaStr, esInicio) {
            let resultado = fechaStr;
            if (esInicio) {
                let fechaAdecuada = new Date(fechaStr);
                fechaAdecuada.setDate(fechaAdecuada.getDate() + 1);
                resultado = fechaAdecuada.toISOString().split("T")[0];
            }
            const meses = [
                "enero", "febrero", "marzo", "abril", "mayo", "junio",
                "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"
            ];
            const diasSemana = [
                "domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado"
            ];
            const fecha = new Date(resultado);
            const diaSemana = diasSemana[fecha.getDay()];
            const dia = fecha.getDate();
            const mes = meses[fecha.getMonth()];
            const año = fecha.getFullYear();
            return `${diaSemana} ${dia} de ${mes} de ${año}`;
        },
        regresarNavegacion() {
            this.visualizarExpedienteCheck = true;
        },
        abrirModalRegistro(arg) {
            this.agregarFechaFin = false;
            this.actualizarExpedienteCheck = false;
            $('#modalAgregarEvento').modal('show');
            this.form.reset();
            this.form.clear();
            this.form.fecha_inicio = arg.dateStr;

        },
        actualizarExpediente(evento) {
            this.visualizarExpedienteCheck = true;
            $('#modalAgregarEvento').modal('show');
            this.actualizarExpedienteCheck = true;
            this.form.id = evento.event.id;
            this.form.fecha_inicio = evento.event.startStr;
            this.form.fecha_fin = evento.event.endStr;
            this.form.evento = evento.event.title;
            this.form.descripcion = evento.event.extendedProps.description;
            this.form.id_defensor = evento.event.extendedProps.id_defensor;
            if (evento.event.endStr == false || evento.event.endStr == "" || evento.event.endStr == undefined || evento.endStr == " ") {
                this.agregarFechaFin = false;
            } else {
                this.agregarFechaFin = true;
            }
            this.obtenerNombreDefensor();
        },
        async handleEventChange(arg) {
            this.form.id = arg.event.id;
            this.form.fecha_inicio = arg.event.startStr;
            this.form.fecha_fin = arg.event.endStr;
            this.form.evento = arg.event.title;
            this.form.descripcion = arg.event.extendedProps.description;
            this.form.id_defensor = arg.event.extendedProps.id_defensor;
            await this.form.put('/calendarioapi/' + this.form.id, this.form).then(() => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Evento actualizado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#modalAgregarEvento').modal('hide');
                this.obtenerEventos();
            }).catch(error => {
                console.log(error);
            });
        },
    }
}
</script>
<style>
.swal-deny-button {
    background-color: var(--danger-color) !important;
    color: white !important;
    border: none !important;
}

.contenedor {
    width: 200px;
    height: 50px;
    overflow: hidden;
}

.alinear-derecha {
    display: block;
    text-align: right;
}
</style>