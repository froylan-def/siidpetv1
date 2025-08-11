<template>
    <div class="content-header mt-3">
        <div class="d-flex justify-content-between align-items-center ">
            <h1 class="h4"> Archivos </h1>
        </div>
    </div>

    <div class="container mt-2">
        <a class="btn btn-secondary ml-1" data-toggle="collapse" href="#collapseExample" role="button"
            aria-expanded="false" aria-controls="collapseExample">
            <i class="fa-solid fa-filter"></i> Filtrar
        </a>

        <button type="button" class="btn btn-primary ml-1" data-toggle="modal" data-target="#exampleModal">
            <i class="fa-solid fa-plus"></i> Registrar archivo
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Registrar archivo </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="gdrive-form" class="container mt-4" onsubmit="handleSubmit(event)">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nombre del archivo</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Ej. Documento de ventas" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="file_type" class="form-label">Tipo de archivo</label>
                                    <select class="form-select" id="file_type" required>
                                        <option value="pdf">PDF</option>
                                        <option value="document">Documento</option>
                                        <option value="image">Imagen</option>
                                        <option value="video">Video</option>
                                        <option value="audio">Audio</option>
                                        <option value="other">Otro</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="gdrive_url" class="form-label">Enlace compartido de Google Drive</label>
                                <input type="url" class="form-control" id="gdrive_url"
                                    placeholder="https://drive.google.com/..." required>
                                <div class="form-text">Debe ser un enlace válido y estar compartido públicamente.</div>
                            </div>

                            
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary "> Guardar </button>
                    </div>


                    
                </div>
            </div>
        </div>

        <div class="container mt-2">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body" style="border-radius: 0.7rem">

                            <h5> Busqueda de archivos </h5>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="archivo" class="form-label">Nombre</label>
                                    <input type="search" class="form-control" :options="defensores"
                                        v-model="filtros.defensor" label="label" :reduce="defensor => defensor.id" />
                                </div>
                                <div class="col-6 d-flex align-items-end">
                                    <a class="btn btn-primary w-100" @click="buscarLogs">
                                        <i class="fa-solid fa-filter"></i> Buscar
                                    </a>
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



                        <EasyDataTable buttons-pagination :headers="cabeceras" :items="logs" :rows-per-page="10"
                            rowsPerPageMessage="Filas por página:" emptyMessage="No hay datos disponibles" alternating
                            table-class-name="customize-table" theme-color="var(--primary-color)">


                            <template #item-defensor="item">
                                <i class="fa-solid fa-user"></i>
                                {{ item.defensor }}
                            </template>

                            <template #item-accion="item">
                                {{ item.accion }}

                                <span v-if="item.expediente != ''">
                                    en el expediente
                                    <a :href="`/expedientes/${item.expediente.id}`" target="_blank"> {{
                                        item.expediente.nuc }} </a>
                                </span>


                            </template>
                            <template #item-defensor="item" v-if="this.rolUsuario != 6">
                                {{ this.obtenerNombreDefensor(item) }}
                            </template>


                            <template #item-descripcion="item">
                                <div v-if="item.descripcionProcesada && item.descripcionProcesada.length">
                                    <div v-for="(entrada, index) in item.descripcionProcesada" :key="index">
                                        <span><b>{{ entrada.propiedad }}</b>: {{ entrada.valor }}</span>
                                    </div>
                                </div>
                                <div v-else>
                                    {{ item.descripcion }}
                                </div>
                            </template>


                            <template #item-created_at="item">
                                {{ formatearFecha(item.created_at) }}
                            </template>



                        </EasyDataTable>



                    </div>
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
    name: "Actividad",
    data() {
        return {
            logs: ref([]),
            cabeceras: [
                { text: "Defensor", value: "defensor", sortable: true },
                { text: "Accion", value: "accion", sortable: true, },
                { text: "Cambio", value: "descripcion" },
                { text: "Fecha y hora", value: "created_at" },
                { text: "Acciones", value: "operation" },
            ],
            filtros: ref({ defensor: '', fecha: '' }),
            defensores: ref([]),
        };
    },
    methods: {

        async obtenerLogs() {
            this.filtros.fecha = "";
            this.filtros.defensor = "";
            let logsApi = await this.axios.get('/logs');
            let logsData = logsApi.data;

            for (let log of logsData) {
                try {
                    log.descripcionProcesada = await this.procesarDescripcion(log.descripcion);
                    if (log.tipo_registro == 3) {
                        let response = await this.axios.get('/expediente/' + log.id_registro);
                        log.expediente = { nuc: response.data.expediente.nuc, id: response.data.expediente.id };
                    } else {
                        log.expediente = "";
                    }
                } catch (error) {
                    console.error("Error procesando descripción", error);
                }
            }
            this.logs = logsData;
        },

        obtenerNombreDefensor(item) {
            if (item.defensor !== null || item.defensor !== "") {
                return `${item.defensor.user.name} ${item.defensor.user.fathername} ${item.defensor.user.mothername}`;
            } else {
                return "-";
            }
        },

        async obtenerDefensores() {
            this.axios.get('/defensor').then((response) => {
                for (let i = 0; i < response.data.length; i++) {
                    const element = response.data[i];
                    this.defensores.push({ id: element.id, label: element.user.name + " " + element.user.fathername + " " + element.user.mothername });
                }
            })
        },

    },
    mounted() {
        // this.obtenerLogs();
        // this.obtenerDefensores();
    },
};
</script>
