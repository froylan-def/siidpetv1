<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Página no disponible </h1>
                </div><!-- /.col -->
                
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card ">
                    
                    <div class="card-header border-0">
                        
                    </div>
                    <div class="card-body ">
                        <div class="col d-flex justify-content-center">

                            <img style="width: 40%" src="img/contruccion.svg" alt="Logo en contrucción" class="brand-image " >
                        </div>

                        <h1 class="text-center"> Sitio en contrucción </h1>
                        
                    
                    </div>




                </div>
            </div>
        </div>

        <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form @submit.prevent="registrarUsuario" @keydown="form.onKeydown($event)">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAgregarUsuario"> Agregar usuario </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                                <input type="hidden" name="_token" :value="csrf">
                                    
                                <div class="form-group">
                                    <label for="Nombre del usuario">Nombre</label>
                                    <input v-model="form.name"  type="text" class="form-control" id="nombre"
                                        aria-describedby="emailHelp" placeholder="Juan Pérez">

                                    <div style="color: red;" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                                    
                                </div>
                                <div class="form-group">
                                    <label for="Correo del usuario">Correo</label>
                                    <input v-model="form.email" type="text" class="form-control" id="correo"
                                        placeholder="algo@correo.com">

                                    <div style="color: red;" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />

                                </div>

                                <div class="form-group">
                                    <label for="Contraseña del usuario">Contraseña</label>
                                    <input v-model="form.password" type="password" class="form-control" id="contrasena" placeholder="Ingrese contraseña">
                                    <div style="color: red;" v-if="form.errors.has('password')" v-html="form.errors.get('password')" />
                                </div>      
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> 
                                <i class="fas fa-times"></i> Cancelar
                            </button>
                            <button type="submit" :disabled="form.busy" class="btn btn-primary">
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
import type { Header, Item } from "vue3-easy-data-table";
import Form from 'vform'

export default {

    data(){
        return{
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            searchField:ref("name"),
            searchValue: ref(""),
            themeColor: "#AB0033",
            datos: [
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
    },
    methods: {
    }
}
</script>
