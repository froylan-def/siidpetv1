<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">NSJPAO</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active"> NSJPAO </li>
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
                    <div class="card-header border-0">
                        <h3 class="card-title">NUC </h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                            </a>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario" @click="abrirModalRegistro">
                              <i class="fa-solid fa-folder-medical"></i>Agregar
                            </button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <span class="ml-2">Campo de busqueda: </span>
                            <select class="custom-select form-control-border ml-2" v-model="searchField">
                                <option value="name">nombre</option>
                                    <option value="email">correo</option>
                                </select>
                        </div>
                        <div class="col-md-5">
                                <span class=""> Valor: </span>
                                <input class="form-control form-control-border border-width-2 mr-2"
                                    v-model="searchValue" placeholder="Juanito perez" type="search"/>
                            </div>
                    </div>
                        
                    <EasyDataTable buttons-pagination 
                        :headers="headers" 
                        :items="items" 
                        :theme-color="themeColor"
                        :search-field="searchField" 
                        :search-value="searchValue">
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

 

    <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form @submit.prevent="registrarNuc" @keydown="form2.onKeydown($event)">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAgregarUsuario"> Agregar NUC </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">         
                                <div class="form-group">
                                    <label for="Nombre del usuario">NUC</label>
                                    <input v-model="form2.nuc"  type="text" class="form-control" id="NUC"
                                        aria-describedby="emailHelp" placeholder="123456">

                                    <div style="color: red;" v-if="form2.errors.has('NUC')" v-html="form2.errors.get('NUC')" />
                                    
                                </div>

                                <div class="form-group">
                                    <label for="Nombre del usuario">FOJA LIBRO</label>
                                    <input v-model="form2.foja"  type="text" class="form-control" id="foja"
                                        aria-describedby="emailHelp" placeholder="2">

                                    <div style="color: red;" v-if="form2.errors.has('foja')" v-html="form2.errors.get('foja')" />
                                    
                                </div>
                                <div class="form-group">
                                    <label for="UGI">UGI</label>
                                    <select  v-model="form2.ugi" type="text" class="form-control" id="ugi">
                                        <option value=""> Seleccione una opción </option>
                                        <option value="1">Value 1</option>
                                        <option value="2" selected>Value 2</option>
                                        <option value="3">Value 3</option>
                                    </select>
                                    <div style="color: red;" v-if="form2.errors.has('ugi')" v-html="form2.errors.get('ugi')" />
                                </div>

                                                 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> 
                                <i class="fas fa-times"></i> Cancelar
                            </button>
                            <button type="submit" :disabled="form2.busy" class="btn btn-primary">
                                <i class="fas fa-save"></i> Registrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</template>

<script lang="ts">
import { ref } from "vue";
import type { Header, Item,ClickRowArgument  } from "vue3-easy-data-table";
import Form from 'vform'


export default {

    data(){
        return {
            searchField:ref("name"),
            searchValue: ref(""),
            themeColor: "#AB0033",
            headers: [
                { text: "NUC", value: "NUC" },
                { text: "Foja", value: "delito" },
                { text: "UGI", value: "fechaRegistro" },
                { text: "Imputado", value: "fechaRegistro" },
                { text: "Estado", value: "estado"  },
                { text: "Acciones", value: "operation"}
            ],
            items: [],
            form2: new Form({
                id: '',
                NUC: '',
                delito: '',
                fechaRegistro: '',
            })
        }
    },
    mounted() {
        this.getList();
    },
    methods: {
        abrirModalRegistro() {
            console.log("Se ha abierto el modal");
            this.form2.reset();
            this.form2.clear();
        },
       getList() { 
            this.axios.get('/NUCs').then((response) => {
                this.items = response.data;
                console.log(response);
            })
        }, 
        eliminar(item) {
             console.log(item.id)
             this.axios.delete('/NUCs/'+item.id).then((response) => {
                 
                console.log(response);
                this.getList();
            })
        }, 
 
        ver(item) {
            window.location.href = "/nuc/ExpedienteImputado/"+item.NUC;
           
       }, 

        async registrarNuc () {

            await this.form2.post('NUCs').then((response) => {
                console.log(response);
            }).catch(error => {
                console.log(error);
            })
            this.getList();
        }
    }
}
</script>
