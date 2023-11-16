<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Peticionarios</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active"> Peticionarios </li>
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
                        <h3 class="card-title">Registro de peticionarios </h3>
                        <div class="card-tools">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPeticionario"
                                @click="abrirModalRegistro">
                                <i class="fas fa-user-plus"></i> Agregar
                            </button>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <p>
                                <a class="text-right" data-toggle="collapse" href="#collapseExample" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    Busqueda
                                </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">

                                    <div class="row">

                                        <div class="col-6 ">
                                            <span class="">Campo de busqueda: </span>
                                            <select class="custom-select " v-model="searchField">
                                                <option value="name">Nombre</option>
                                                <option value="email">Correo</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <span class=""> Valor: </span>
                                            <input class="form-control  border-width-2 mr-2" v-model="searchValue"
                                                placeholder="Juanito perez" type="search" />
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <EasyDataTable buttons-pagination :headers="datos" :items="peticionarios"
                            :search-field="searchField" :search-value="searchValue">
                            <template #item-operation="item">
                                <div class="operation-wrapper">

                                    <!-- <button class="btn btn-primary btn-sm mt-2 mb-2 mr-1"   @click="verDireccion(item)" >
                                        <i class="fa-solid fa-map-location-dot"></i> Dirección
                                    </button> -->

                                    <button class="btn btn-warning btn-sm mt-2 mb-2 mr-1"
                                        @click="actualizarPeticionario(item)">
                                        <i class="fa-solid fa-pen-to-square"></i>

                                    </button>

                                    <button class="btn btn-danger btn-sm mt-2 mb-2 mr-1"
                                        @click="eliminarPeticionario(item)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                </div>
                            </template>
                        </EasyDataTable>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalAgregarPeticionario" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form
                        @submit.prevent="actualizarPeticionarioCheck === false ? registrarPeticionario : editarPeticionario"
                        @keydown="form.onKeydown($event)">
                        <div class="modal-header">
                            <h5 v-if="actualizarPeticionarioCheck" class="modal-title" id="modalAgregarPeticionario">
                                Actualizar peticionario </h5>
                            <h5 v-else class="modal-title" id="modalAgregarPeticionario"> Agregar peticionario </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="Nombre del usuario">Nombre (s)</label>
                                <input v-model="form.nombres" type="text" class="form-control" id="nombre"
                                    aria-describedby="emailHelp" placeholder="Juan Pérez">
                                <div style="color: red;" v-if="form.errors.has('nombres')"
                                    v-html="form.errors.get('nombres')" />
                            </div>
                            <div class="form-group">
                                <label for="Correo del usuario">Apellido Paterno:</label>
                                <input v-model="form.apellidoP" type="text" class="form-control" id="correo" placeholder="">
                                <div style="color: red;" v-if="form.errors.has('apellidoP')"
                                    v-html="form.errors.get('apellidoP')" />
                            </div>

                            <div class="form-group">
                                <label for="Correo del usuario">Apellido Materno:</label>
                                <input v-model="form.apellidoM" type="text" class="form-control" id="apellidoM"
                                    placeholder="">
                                <div style="color: red;" v-if="form.errors.has('apellidoM')"
                                    v-html="form.errors.get('apellidoM')" />
                            </div>

                            <div class="form-group">
                                <label for="Correo del usuario"> CURP: </label>
                                <input v-model="form.CURP" type="text" class="form-control" id="CURP" placeholder="">
                                <div style="color: red;" v-if="form.errors.has('CURP')" v-html="form.errors.get('CURP')" />
                            </div>




                            <div class="form-group">
                                <label for="Correo del usuario"> Municipio: </label>
                                <input v-model="form.municipio" type="text" class="form-control" id="municipio"
                                    placeholder="">
                                <div style="color: red;" v-if="form.errors.has('municipio')"
                                    v-html="form.errors.get('municipio')" />
                            </div>

                            <div class="form-group">
                                <label for="Correo del usuario"> Correo Electronico: </label>
                                <input v-model="form.correo" type="text" class="form-control" id="correo" placeholder="">
                                <div style="color: red;" v-if="form.errors.has('correo')"
                                    v-html="form.errors.get('correo')" />
                            </div>

                            <div class="form-group">
                                <label for="Correo del usuario"> Telefono: </label>
                                <input v-model="form.telefono" type="text" class="form-control" id="correo" placeholder="">
                                <div style="color: red;" v-if="form.errors.has('telefono')"
                                    v-html="form.errors.get('telefono')" />
                            </div>

                            <div class="form-group">
                                <label for="Correo del usuario"> Telefono Particular: </label>
                                <input v-model="form.telefono_particular" type="text" class="form-control"
                                    id="telefono_particular" placeholder="">
                                <div style="color: red;" v-if="form.errors.has('telefono_particular')"
                                    v-html="form.errors.get('telefono_particular')" />
                            </div>

                            <div class="form-group">
                                <label for="Correo del usuario"> Calle: </label>
                                <input v-model="form.calle" type="text" class="form-control" id="calle" placeholder="">
                                <div style="color: red;" v-if="form.errors.has('calle')"
                                    v-html="form.errors.get('calle')" />
                            </div>

                            <div class="form-group">
                                <label for="Correo del usuario"> Colonia: </label>
                                <input v-model="form.colonia" type="text" class="form-control" id="colonia" placeholder="">
                                <div style="color: red;" v-if="form.errors.has('colonia')"
                                    v-html="form.errors.get('colonia')" />
                            </div>

                            <div class="form-group">
                                <label for="Correo del usuario"> Municipio: </label>
                                <input v-model="form.municipio" type="text" class="form-control" id="municipio"
                                    placeholder="">
                                <div style="color: red;" v-if="form.errors.has('municipio')"
                                    v-html="form.errors.get('municipio')" />
                            </div>

                            <div class="form-group">
                                <label for="Correo del usuario"> Código Postal: </label>
                                <input v-model="form.codigo_postal" type="text" class="form-control" id="codigo_postal"
                                    placeholder="">
                                <div style="color: red;" v-if="form.errors.has('codigo_postal')"
                                    v-html="form.errors.get('codigo_postal')" />
                            </div>


                            <div class="form-group">
                                <label for="Correo del usuario"> Estado: </label>
                                <input v-model="form.estado" type="text" class="form-control" id="estado" placeholder="">
                                <div style="color: red;" v-if="form.errors.has('estado')"
                                    v-html="form.errors.get('estado')" />
                            </div>

                            <div class="form-group">
                                <label for="Correo del usuario"> Pais: </label>
                                <input v-model="form.pais" type="text" class="form-control" id="pais" placeholder="">
                                <div style="color: red;" v-if="form.errors.has('pais')" v-html="form.errors.get('pais')" />
                            </div>

                            <div class="form-group">
                                <label for="Correo del usuario"> Numero Exterior: </label>
                                <input v-model="form.num_ext" type="text" class="form-control" id="estado" placeholder="">
                                <div style="color: red;" v-if="form.errors.has('estado')"
                                    v-html="form.errors.get('estado')" />
                            </div>

                            <div class="form-group">
                                <label for="Correo del usuario"> Numero Interior: </label>
                                <input v-model="form.num_int" type="text" class="form-control" id="num_int" placeholder="">
                                <div style="color: red;" v-if="form.errors.has('num_int')"
                                    v-html="form.errors.get('num_int')" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="fas fa-times"></i> Cancelar
                            </button>
                            <button v-if="actualizarPeticionarioCheck === false" @click="registrarPeticionario"
                                type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Registrar
                            </button>
                            <button v-else type="submit" :disabled="form.busy" @click="editarPeticionario"
                                class="btn btn-warning">
                                <i class="fas fa-save"></i> Actualizar
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
import Swal from 'sweetalert2'


export default {

    data() {
        return {
            actualizarPeticionarioCheck: ref(false),
            searchField: ref("name"),
            searchValue: ref(""),
            themeColor: "#AB0033",
            datos: [
                { text: "Nombre", value: "nombres" },
                { text: "Apellido Paterno", value: "apellidoP" },
                { text: "Apellido Materno", value: "apellidoM" },
                { text: "Municipio", value: "municipio" },
                { text: "Telefono", value: "telefono_particular" },
                { text: "Acciones", value: "operation" }
            ],
            peticionarios: [],
            form: new Form({
                id: '',
                nombres: '',
                apellidoP: '',
                apellidoM: '',
                CURP: '',
                correo: '',
                telefono: '',
                telefono_particular: '',
                calle: '',
                colonia: '',
                municipio: '',
                estado: '',
                pais: '',
                num_int: '',
                num_ext: '',
                id_direccion: '',
                codigo_postal: ''
            })
        }
    },
    mounted() {
        this.obtenerPeticionarios();
    },
    methods: {
        verDireccion($peticionario) {

            console.log("Cargar datos");
            console.log($peticionario);

        },
        eliminarPeticionario($peticionario) {

            console.log("BORRAR");
            console.log($peticionario.id);

            Swal.fire({
                title: '¿Estas seguro de eliminar este registro?',
                showDenyButton: true,
                confirmButtonText: 'Aceptar',
                denyButtonText: `Cancelar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    
                    this.axios.get('/peticionario/eliminar/' + $peticionario.id).then((response) => {
                        console.log("Respuesta de la eliminacion");
                        console.log(response);
                        this.obtenerPeticionarios();
                        $('#modalAgregarPeticionario').modal('hide');

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Usuario eliminado con éxito',
                            showConfirmButton: false,
                            timer: 1500
                        }) 

                    }).catch(error => {
                        console.log(error);
                    });

                    

                } else if (result.isDenied) {
                    //Swal.fire('Changes are not saved', '', 'info')
                }
            })

        },
        abrirModalRegistro() {
            this.actualizarPeticionarioCheck = false;
            this.form.reset();
            this.form.clear();
        },

        obtenerPeticionarios() {
            this.axios.get('/peticionario').then((response) => {
                this.peticionarios = response.data;
                console.log(response.data);
            })
        },
        async actualizarPeticionario(peticionario) {
            $('#modalAgregarPeticionario').modal('show');
            this.form.fill(peticionario);
            this.actualizarPeticionarioCheck = true;
            //console.log("Peticionario a actualizar ");
            //console.log( peticionario );


        },
        async editarPeticionario() {
            console.log("Actualizar peticionario");
            await this.form.put('/peticionario/' + this.form.id, this.form).then((response) => {
                console.log(response);
                this.obtenerPeticionarios();
                $('#modalAgregarPeticionario').modal('hide');

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Peticionario actualizado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                }) 
            }).catch(error => {
                console.log(error);
            });
        },
        async registrarPeticionario() {
            //console.log("Registrar");
            await this.form.post('/peticionario').then((response) => {
                console.log(response);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Peticionario guardado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                }) 

                $('#modalAgregarPeticionario').modal('hide');
            }).catch(error => {
                console.log(error);
            });

            this.obtenerPeticionarios();
        }
    }
}
</script>
