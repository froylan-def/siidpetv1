<template>
    <div class="content-header mt-3">
        <div class="d-flex justify-content-between align-items-center ">
            <h1 class="h4">Actividad de usuarios</h1>
        </div>
    </div>

    <div class="container mt-2">
        <a class="btn btn-secondary ml-1" data-toggle="collapse" href="#collapseExample" role="button"
            aria-expanded="false" aria-controls="collapseExample">
            <i class="fa-solid fa-filter"></i> Filtrar
        </a>

        <a class="btn btn-secondary ml-1" data-toggle="collapse" href="#collapseExample" role="button"
            aria-expanded="false" aria-controls="collapseExample">
            <i class="fa-solid fa-filter"></i> Buscar todo
        </a>

        <div class="container mt-2">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body" style="border-radius: 0.7rem">
                            <h5> Busqueda de logs </h5>
                            <div class="row mb-3">
                                <div class="col-6 ">
                                    <label for="municipio" class="form-label">Defensor</label>
                                    Defensor *
                                    <v-select :options="defensores" v-model="filtros.defensor" label="label"
                                        :reduce="defensor => defensor.id"></v-select>
                                </div>
                                <div class="col-6">
                                    <label for="municipio" class="form-label"> Fecha </label>
                                    <input class="form-control border-width-2 " v-model="filtros.fecha"
                                        placeholder="Escriba la fecha" type="date" />
                                </div>
                            </div>
                            <div class="row text-right">
                                <a class="btn btn-primary ml-1" @click="buscarLogs">
                                    <i class="fa-solid fa-filter"></i> Buscar
                                </a>
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
                // { text: "Acciones", value: "operation" },
            ],
            filtros: ref({ defensor: '', fecha: '' }),
            defensores: ref([]),
        };
    },
    methods: {
    
        async buscarLogs(){

            console.log("Parametros de busqueda");
            console.log( this.filtros );

        },
        async obtenerLogs(){
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

        algo() {
            return "Hola";
        },

        async procesarDescripcion(descripcion) {
            let descripcionObjeto = JSON.parse(descripcion);
            const esArreglo = Array.isArray(descripcionObjeto);
            if (!esArreglo) descripcionObjeto = [descripcionObjeto];

            let resultado = [];
            for (const obj of descripcionObjeto) {
                let [propiedad] = Object.keys(obj);
                let valor = obj[propiedad];
                let propiedadObj = propiedad;
                if (propiedadObj !== 'id' && propiedadObj !== 'activo') {
                    let tabla = propiedadObj.split("id_")[1];
                    try {
                        if (tabla === "delito") {
                            propiedad = tabla;
                            let response = await this.axios.get('/delito/' + valor);
                            valor = response.data.delito.nombre;
                        } else if (tabla === "victima") {
                            propiedad = tabla;
                            let response = await this.axios.get('/victima/' + valor);
                            valor = `${response.data.victima.nombres} ${response.data.victima.apellido_paterno} ${response.data.victima.apellido_materno}`;
                        } else if (tabla === "imputado") {
                            propiedad = tabla;
                            let response = await this.axios.get('/imputado/' + valor);
                            valor = `${response.data.imputado.nombres} ${response.data.imputado.apellido_paterno} ${response.data.imputado.apellido_materno}`;
                        }
                    } catch (error) {
                        console.warn("Error obteniendo detalle para", propiedad, valor);
                    }
                    resultado.push({ propiedad, valor });
                }
            }

            return resultado;
        },

        formatearFecha(fechaISO) {
            const fecha = new Date(fechaISO);

            const opciones = {
                year: 'numeric',
                month: 'numeric',
                day: 'numeric',
                hour: 'numeric',
                minute: '2-digit',
                hour12: true,
            };

            return fecha.toLocaleString('es-MX', opciones);
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
        this.obtenerLogs();
        this.obtenerDefensores();
    },
};
</script>
