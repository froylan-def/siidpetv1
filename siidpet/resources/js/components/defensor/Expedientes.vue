<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Expedientes</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <button class="btn btn-success"
                                @click="irANuevo">
                                <i class="fa-solid fa-circle-plus"></i> Nuevo
                            </button>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <p>
                                <a class="text-right" data-toggle="collapse" href="#collapseExample" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    Buscar
                                </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-6 ">
                                            <span class="">Buscar por: </span>
                                            <select class="custom-select " v-model="searchField">
                                                <option value="nombres">Nombres</option>
                                                <option value="apellido_paterno">Apellido Paterno</option>
                                                <option value="apellido_materno">Apellido Materno</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <span class=""> Dato: </span>
                                            <input class="form-control  border-width-2 mr-2" v-model="searchValue"
                                                :placeholder=searchField type="search" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <EasyDataTable buttons-pagination :headers="datos" :items="items" :theme-color="themeColor"
                            :search-field="searchField" :search-value="searchValue">
                            <template #item-operation="item">
                                <div class="operation-wrapper">
                                    <button class="btn btn-primary btn-sm mt-2 mb-2 mr-1" @click="irADetalles(item)">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>
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
import type { Header, Item } from "vue3-easy-data-table";
import Form from 'vform'
import Swal from 'sweetalert2'
export default {
    data() {
        return {
            searchField: ref("name"),
            searchValue: ref(""),
            themeColor: "#AB0033",
            datos: [
                { text: "id", value: "id" },
                { text: "Foja", value: "foja" },
                { text: "Ugi", value: "ugi.nombre" },
                { text: "Defensor", value: "defensor.nombres"},
                { text: "Entrevista", value: "id_entrevista"},
                { text: "Nuc", value: "nuc"},
                { text: "Detalles", value: "operation" },
            ],
            items: [],
        }
    },
    mounted() {
        this.obtenerExpedientes();
    },
    methods: {

        obtenerExpedientes() {
            this.axios.get('/expediente').then( (response) => {
                this.items = response.data;
                // console.log(response);
            })
        },

        irANuevo(){
            this.$router.push('/expedientes/new');
        },

        async irADetalles(item) {
            console.log("Ir a la otra pagina");
            console.log(item);
            this.$router.push('/expedientes/' + item.id);
        },
        
    }
}
</script>
