<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Defensores</h1>
                </div><!-- /.col -->
                <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active"> Defensores </li>
                    </ol>
                </div> -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <h3 class="card-title mt-2"> Registro de defensores= usuarios </h3> -->
                        <div class="card-tools">
                            <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarDefensor"
                                @click="abrirModalRegistro">
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
                                    <button class="btn btn-warning btn-sm mt-2 mb-2 mr-1" @click="actualizarDefensor(item)">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <button class="btn btn-danger btn-sm mt-2 mb-2 mr-1" @click="eliminarUsuario(item)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </template>
                        </EasyDataTable>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalAgregarDefensor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form
                    @submit.prevent="actualizarDefensorCheck === false ? registrarDefensor : actualizarDefensor" @keydown="form.onKeydown($event)">
                        <div class="modal-header">
                            <h5 v-if="!actualizarDefensorCheck" class="modal-title" id="modalAgregarDefensor"> Nuevo </h5>
                            <h5 v-else class="modal-title" id="modalAgregarDefensor"> Actualizar usuario </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="Nombres">Nombres</label>
                                <input v-model="form.nombres" type="text" class="form-control" id="nombres"
                                    aria-describedby="emailHelp" placeholder="Nombres">

                                <div style="color: red;" v-if="form.errors.has('nombres')" v-html="form.errors.get('nombres')" />

                            </div>

                            <div class="form-group">
                                <label for="Apellido paterno">Apellido Paterno</label>
                                <input v-model="form.apellido_paterno" type="text" class="form-control" id="apellido_paterno"
                                    placeholder="Apellido Paterno">

                                <div style="color: red;" v-if="form.errors.has('apellido_paterno')"
                                    v-html="form.errors.get('apellido_paterno')" />
                            </div>

                            <div class="form-group">
                                <label for="Apellido Materno">Apellido Materno</label> <span  v-if="actualizarDefensorCheck" style="color: red;"> *  </span>
                                <input v-model="form.apellido_materno" type="text" class="form-control" id="apellido_materno"
                                    placeholder="Apellido Materno">
                                <div style="color: red;" v-if="form.errors.has('apellido_materno')"
                                    v-html="form.errors.get('apellido_materno')" />
                            </div>

                            <div class="form-group">
                                <label for="Telefono">Telefono</label> <span  v-if="actualizarDefensorCheck" style="color: red;"> *  </span>
                                <input v-model="form.telefono" type="text" class="form-control" id="telefono"
                                    placeholder="8341234567">
                                <div style="color: red;" v-if="form.errors.has('telefono')"
                                    v-html="form.errors.get('telefono')" />
                            </div>

                            <div class="form-group">
                                <label for="Sexo">Sexo</label>

                                <select v-model="form.sexo" id="sexo" type="text" class="form-control " name="IDRol">
                                    <option value="Masculino">
                                       Masculino
                                    </option>
                                    <option value="Femenino">
                                        Femenino
                                     </option>
                                </select>

                                <div style="color: red;" v-if="form.errors.has('sexo')"
                                    v-html="form.errors.get('sexo')" />
                            </div>


                            <div class="form-group">
                                <label for="Municipio de trabajo">Municipio:</label>
                                <select v-model="form.id_municipio" id="rol" type="text" class="form-control " name="id_municipio">
                                    <option v-for="municipio in municipios" :value="municipio.id">
                                        {{ municipio.nombre }}
                                    </option>
                                </select>

                                <div style="color: red;" v-if="form.errors.has('id_municipio')"
                                    v-html="form.errors.get('id_municipio')" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="fas fa-times"></i> Cancelar
                            </button>

                            <button  v-if="!actualizarDefensorCheck" type="submit" :disabled="form.busy" class="btn btn-primary" @click="registrarDefensor">
                                <i class="fas fa-save"></i> Registrar
                            </button>
                            <button v-else type="submit" :disabled="form.busy" class="btn btn-warning" @click="editarDefensor">
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
            actualizarDefensorCheck: ref(false),
            searchField: ref("name"),
            searchValue: ref(""),
            themeColor: "#AB0033",
            datos: [
                { text: "Nombres", value: "nombres" },
                { text: "Apellido Materno", value: "apellido_materno" },
                { text: "Apellido Paterno", value: "apellido_paterno" },
                { text: "Municipio", value: "municipio.nombre"},
                { text: "Sexo", value: "sexo"},
                { text: "Telefono", value: "telefono"},
                { text: "Opciones", value: "operation" },
            ],
            items: [],
            municipios: [],
            form: new Form({
                id: '',
                nombres: '',
                apellido_paterno: '',
                apellido_materno: '',
                id_municipio: '',
                telefono: '',
                sexo: '',
                activo:1,
            })
        }
    },
    mounted() {
        this.obtenerDefensores();
        this.obtenerMunicipios();
    },
    methods: {
        abrirModalRegistro() {
            this.actualizarDefensorCheck = false;
            this.form.reset();
            this.form.clear();
        },

        obtenerMunicipios() {
            this.axios.get('/municipios').then((response) => {
                this.municipios= response.data.filter(objeto => objeto.estado === 28);
                console.log("Municipios");
                console.log(this.municipios);
            })
        },

        obtenerDefensores() {
            this.axios.get('/defensor').then( (response) => {
                this.items = response.data;
            })
        },

        async registrarDefensor() {
            await this.form.post('/defensor').then((response) => {
                console.log(response);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: response.data.mensaje,
                    showConfirmButton: false,
                    timer: 1500
                })
                this.obtenerDefensores();
                $('#modalAgregarDefensor').modal('hide');
            }).catch(error => {
                console.log(error);
            });
        },
        async editarDefensor() {
            await this.form.put('/defensor/' + this.form.id, this.form).then((response) => {
                console.log(response);
                this.obtenerDefensores();
                $('#modalAgregarDefensor').modal('hide');

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Usuario actualizado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                })
            }).catch(error => {
                console.log(error);
            });
        },
        async actualizarDefensor(defensor) {
            console.log("Datos del defensor a actualizar");
            console.log(defensor);
            console.log("Formulario");
            console.log(this.form);
            console.log("Municipios");
            console.log(this.municipios);

            $('#modalAgregarDefensor').modal('show');
            this.form.fill(defensor);
            this.actualizarDefensorCheck = true;
        },
        desactivarUsuario($usuario) {

            Swal.fire({
                title: '¿Está seguro de eliminar este usuario?',
                showDenyButton: true,
                confirmButtonText: 'Aceptar',
                denyButtonText: `Cancelar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.axios.delete('/defensor/' + $usuario.id).then((response) => {
                        console.log("Respuesta de la eliminacion");
                        console.log(response);
                        this.obtenerDefensores();
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

        }
    }
}
</script>
