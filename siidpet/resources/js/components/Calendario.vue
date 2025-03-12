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
                        <a @click="this.$router.push('/expedientes')" class="btn btn-secondary ml-1"
                            data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                            aria-controls="collapseExample">
                            <i class="fa-solid fa-magnifying-glass"></i> Buscar
                        </a>
                    </div>
                    <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarEvento"
                        @click="abrirModalRegistro">
                        <i class="fa-solid fa-plus"></i> Crear nuevo evento
                    </button>
                </div>
                <div class="card" style="border-radius: 0.7rem">
                    <div class="card-body p-0">
                        <FullCalendar :options="calendarOptions">
                            <template v-slot:eventContent='arg'>
                                <b>{{ arg.event.title }} </b>
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
                        

                        <button class="btn btn-primary" @click="cambiarModoEdicion">
                            <i class="fas fa-save"></i> Editar
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <div class="modal-content" v-else>
                    <form
                        @submit.prevent="actualizarExpedienteCheck === false ? registrarEvento : editarEvento">
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
                                <div style="color: red;" v-if="form.errors.has('evento')"
                                    v-html="form.errors.get('evento')" />
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                <input v-model="form.descripcion" type="text" class="form-control" id="titulo"
                                    aria-describedby="emailHelp" placeholder="Descripcion del evento">
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
                        
                            <div class="form-group" >
                                <input type="checkbox" v-model="agregarFechaFin" >
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
import FullCalendar from '@fullcalendar/vue3'

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
            agregarFechaFin: false
        }
    },
    mounted() {
        this.calendarOptions.events = this.events;
        this.obtenerEventos();
        this.obtenerDefensores();
    },
    methods: {
        async obtenerEventos() {
            try {
                const response = await this.axios.get('/calendarioapi');
                const _this = this;
                response.data.forEach(function (element) {
                    _this.events.push({
                        id: element.id,
                        title: element.evento,
                        description: element.descripcion,
                        start: element.fecha_inicio,
                        end: element.fecha_fin,
                        id_defensor: element.id_defensor
                    });
                });
            } catch (error) {
                console.error('Error fetching ocupaciones:', error);
            }
        },
        async obtenerNombreDefensor(){
            let defensor = "";
            try {
                const response = await this.axios.get('/defensor/'+this.form.id_defensor);
                defensor = response.data.defensor.user.name +" "+ response.data.defensor.user.fathername +" "+response.data.defensor.user.mothername;
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
            let fechaAdecuada = new Date( this.form.fecha_fin );
            fechaAdecuada.setDate(fechaAdecuada.getDate() - 1);
            this.form.fecha_fin = fechaAdecuada.toISOString().split("T")[0];
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
            if(esInicio){
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
        regresarNavegacion(){
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
            if( evento.event.endStr == false || evento.event.endStr == "" || evento.event.endStr == undefined || evento.endStr == " "){
                this.agregarFechaFin = false;
            }else{
                this.agregarFechaFin = true;
            }
            this.obtenerNombreDefensor();
        },
        async editarEvento() {
            if(!this.agregarFechaFin){
                this.form.fecha_fin = "";
            }else{
                if( this.form.fecha_fin != "" ){
                    let fechaAdecuada = new Date( this.form.fecha_fin );
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
        async handleEventChange(arg) {

            console.log("Argumentos del evento");
            console.log(arg);
            
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
</style>