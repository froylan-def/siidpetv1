<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Usuarios</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active"> Usuarios </li>
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
                        <h3 class="card-title"> Datos registrados de los peticionarios </h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                            </a>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
                                <i class="fas fa-user-plus"></i> Agregar
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

                        <EasyDataTable buttons-pagination :headers="headers" :items="items" :theme-color="themeColor"
                            :search-field="searchField" :search-value="searchValue"  />
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAgregarUsuario"> Agregar usuario </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="registrarUsuario" @keydown="form.onKeydown($event)">
                            <div class="form-group">
                                <label for="Nombre del usuario">Nombre</label>
                                <input v-model="form.name"  type="text" class="form-control" id="nombre"
                                    aria-describedby="emailHelp" placeholder="Juan Pérez">

                                <div v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                                
                            </div>
                            <div class="form-group">
                                <label for="Correo del usuario">Correo</label>
                                <input v-model="form.email" type="text" class="form-control" id="correo"
                                    placeholder="algo@correo.com">

                                <div v-if="form.errors.has('email')" v-html="form.errors.get('email')" />

                            </div>

                            <div class="form-group">
                                <label for="Contraseña del usuario">Contraseña</label>
                                <input type="text" class="form-control" id="contrasena"
                                    placeholder="Introduce edad">
                            </div>
                            
                            <button type="submit" :disabled="form.busy">
                                Registrar
                            </button>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i
                                class="fas fa-times"></i> Cancelar </button>
                        <button type="button" class="btn btn-primary"> <i class="fas fa-save"></i> Guardar </button>
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

export default {

    data(){
        return{
            searchField:ref("name"),
            searchValue: ref(""),
            themeColor: "#AB0033",
            headers: [
                { text: "Id", value: "id" },
                { text: "Nombre", value: "name" },
                { text: "Correo", value: "email" },
                { text: "Contraseña", value: "password" },
                { text: "Token", value: "remember_token" },
                { text: "Verificado", value: "email_verified_at" , sortable: true },
                { text: "Creado", value: "created_at" },
                { text: "Actualizado", value: "updated_at"}
            ],
            items: [],
            form: new Form({
                id: '',
                name: '',
                email: '',
                password: '',
                remember_token: '',
                email_verified_at: '',
                created_at: '',
                updated_at: ''
            })
        }
    },
    mounted() {
        this.getList();
    },
    methods: {
        getList() {
            this.axios.get('/users').then((response) => {
                this.items = response.data;
            })
        },

        async registrarUsuario () {
            await this.axios.post('/users', this.form).then((response) => {
                this.items = response.data;
            })
            //const response = await this.form.post('/users');
            this.getList();
            //$('#addContacto').modal('hide');
            //this.$refs['modalAgregarUsuario'].hide()
            $('#modalAgregarUsuario').modal('hide');
        }
    }
}
</script>
