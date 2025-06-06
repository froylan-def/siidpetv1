<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Permisos de Roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active"> Permisos </li>
                    </ol>
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
                    <h3 class="card-title"> <b>  Permisos  </b> </h3>    
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-12">
                            <span> Rol: </span>
                            <select @change="obtenerPermisos" class="custom-select form-control my-2 " v-model="rol">
                                <option value="1">Administrador</option>
                                <option value="2"> Director General </option>
                                <option value="3"> Director Defensoria </option>
                                <option value="4"> Director Asesorias </option>
                                <option value="5"> Jefe de Asesorias </option>
                                <option value="6"> Defensor </option>
                                <option value="7"> Asesor </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <span> Permisos: </span>
                        <EasyDataTable buttons-pagination 
                            :headers="headers" 
                            :items="items" 
                            :theme-color="themeColor">
                            <template #item-operation="item">
                                <div class="operation-wrapper">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario" @click="abrirModalRegistro">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                        
                                    <button class="btn btn-primary"   @click="eliminar(item)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    
                                    <a>
                                        <button class="btn btn-primary"   @click="ver(item)" >
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </a>
                                </div>
                            </template>
                        </EasyDataTable>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</template>

<script lang="ts">
import { ref } from "vue";
import type { Header, Item,ClickRowArgument  } from "vue3-easy-data-table";
import Form from 'vform'


const showRow = (item: ClickRowArgument) => {
    console.log("aaa")
};
export default {

    data(){
        return{
            rol: ref("name"),
            themeColor: ref("#AB0033"),
            headers: [
                { text: "Id", value: "Id" },
                { text: "Nombre", value: "Nombre" },
                { text: "Detalles", value: "Detalles" },
                { text: "Ruta", value: "Ruta"  },
                { text: "Fecha", value: "Fecha"}
            ],
            items: [],
        }
    },
    mounted() {
        this.obtenerPermisos();
    },
    methods: {
        obtenerPermisos() {
            console.log("Rol a obtener permisos " + this.rol );
        }
    }
}
</script>
