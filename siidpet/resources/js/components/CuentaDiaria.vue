<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Inicio</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active"> Cuenta diaria </li>
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
                        <h3 class="card-title mt-2">Registro de Cuenta diaria </h3>
                        <div class="card-tools">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCuentaDiaria"
                                @click="abrirModalRegistroCuentaDiaria">
                                <i class="fas fa-plus"></i> Agregar
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
                                                placeholder="Nombre" type="search" />
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- <EasyDataTable buttons-pagination :headers="datos" :items="items" :theme-color="themeColor"
                            :search-field="searchField" :search-value="searchValue">

                            <template #item-operation="item">
                                <div class="operation-wrapper">
                                    <button class="btn btn-warning btn-sm mt-2 mb-2 mr-1" @click="actualizarUsuario(item)">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <button class="btn btn-danger btn-sm mt-2 mb-2 mr-1" @click="eliminarUsuario(item)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </template>

                        </EasyDataTable> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalAgregarCuentaDiaria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form 
                    @submit.prevent="actualizarCuentaDiariaCheck === false ? registrarCuentaDiaria : actualizarCuentaDiaria" @keydown="form.onKeydown($event)">
                        <div class="modal-header">
                            <h5 v-if="!actualizarCuentaDiaria" class="modal-title" id="modalAgregarCuentaDiaria"> Agregar registro de cuenta diaria </h5>
                            <h5 v-else class="modal-title" id="modalAgregarCuentaDiaria"> Actualizar usuario </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="num">Num</label>
                                <input v-model="form.num" type="number" class="form-control" id="num"
                                    aria-describedby="num" placeholder="1234">
                                <div style="color: red;" v-if="form.errors.has('num')" v-html="form.errors.get('num')" />
                            </div>

                            <div class="form-group">
                                <label for="cp">CP</label>
                                <input v-model="form.cp" type="text" class="form-control" id="cp"
                                    placeholder="xxxx/xxxx">
                                <div style="color: red;" v-if="form.errors.has('cp')"
                                    v-html="form.errors.get('cp')" />
                            </div>

                            <div class="form-group">
                                <label for="imputado">Imputado</label>
                                


                                    <select class="form-control" v-model="form.imputado">
                                        <option v-for="opcion in imputadosOpciones" v-bind:value="opcion.value">
                                          {{ opcion.text }}
                                        </option>
                                      </select>



                                <div style="color: red;" v-if="form.errors.has('imputado')"
                                    v-html="form.errors.get('imputado')" />
                            </div>
                    
                            <div class="form-group">
                                <label for="delito">Delito</label>
                                    <select class="form-control" v-model="form.delito">
                                        <option v-for="opcion in delitosOpciones" v-bind:value="opcion.value">
                                          {{ opcion.text }}
                                        </option>
                                      </select>

                                <div style="color: red;" v-if="form.errors.has('delito')"
                                    v-html="form.errors.get('delito')" />
                            </div>



                            <div class="form-group">
                                <label for="audiencia">Tipo de audiencia</label>

                                <select class="form-control" v-model="form.audiencia">
                                    <option v-for="opcion in audienciasOpciones" v-bind:value="opcion.value">
                                        {{ opcion.text }}
                                    </option>
                                </select>

                                <div style="color: red;" v-if="form.errors.has('audiencia')"
                                    v-html="form.errors.get('audiencia')" />
                            </div>


                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input v-model="form.fecha" type="date" class="form-control" id="fecha"
                                    >
                                <div style="color: red;" v-if="form.errors.has('fecha')"
                                    v-html="form.errors.get('fecha')" />
                            </div>


                            <div class="form-group">
                                <label for="fecha">Hora</label>
                                <input v-model="form.hora" type="time" class="form-control" id="hora"
                                    >
                                <div style="color: red;" v-if="form.errors.has('hora')"
                                    v-html="form.errors.get('hora')" />
                            </div>


                            <div class="form-group">
                                <label for="fecha">Sala</label>
                                <input v-model="form.sala" type="text" class="form-control" id="sala"
                                    placeholder="D">
                                <div style="color: red;" v-if="form.errors.has('sala')"
                                    v-html="form.errors.get('sala')" />
                            </div>


                            <div class="form-group">
                                <label for="observaciones">Observaciones</label>
                                <textarea model="form.observaciones" rows="4" class="form-control" id="observaciones"
                                    placeholder="Describa las observaciones"> </textarea>
                                <div style="color: red;" v-if="form.errors.has('observaciones')"
                                    v-html="form.errors.get('observaciones')" />
                            </div>


                            <div class="form-group">
                                <label for="resultado">Resultado</label>
                                <textarea model="form.resultado" rows="2" class="form-control" id="resultado"
                                    placeholder="Escriba el resultado"> </textarea>
                                <div style="color: red;" v-if="form.errors.has('resultado')"
                                    v-html="form.errors.get('resultado')" />
                            </div>
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="fas fa-times"></i> Cancelar
                            </button>
                            <button  v-if="!actualizarCuentaDiariaCheck" type="submit" :disabled="form.busy" class="btn btn-primary" @click="registrarCuentaDiaria">
                                <i class="fas fa-save"></i> Registrar
                            </button> 
                            <button v-else type="submit" :disabled="form.busy" class="btn btn-warning" @click="editarUsuario">
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
    name: 'HelloWorld',
    data() {
        return {
            yourName: '',
            visible: false,
            actualizarCuentaDiariaCheck: false,
            form: new Form({
                id: '',
                num: '',
                cp: '',
                fecha: '',
                hora: '',
                sala: '',
                
                resultado: '',
                imputado: '',
                delito: '',
                audiencia: '',

                observaciones: '',
            }),
            delitosOpciones: [],
            imputadosOpciones: [],
            audienciasOpciones: [],
        };
    },
    created() {
        this.obtenerCuentasDiarias();
        this.obtenerImputados();
        this.obtenerDelitos();
        this.obtenerAudiencias();
    },
    methods: {


        async obtenerAudiencias(){

            await this.axios.get('/obteneraudiencias').then((response) => {

                console.log("Audiencias");
                console.log( response );
                for (let i = 0; i < response.data.length; i++) {
                    this.audienciasOpciones.push({ text: response.data[i].nombre, value: response.data[i].id });
                }
            }).catch(error => {
                console.log(error);
            });

        },

        async obtenerDelitos() {
            
            await this.axios.get('/obtenerdelitos').then((response) => {
                for (let i = 0; i < response.data.length; i++) {
                    this.delitosOpciones.push({ text: response.data[i].nombre, value: response.data[i].id });
                }
            }).catch(error => {
                console.log(error);
            });

        },

        async obtenerImputados() {

            await this.axios.get('/obenerimputados').then((response) => {

                console.log("Imputados");
                console.log( response );

                for( let i = 0; i < response.data.length; i++ ){
                    this.imputadosOpciones.push({ text: response.data[i].nombres + " " + response.data[i].apellidoP + " " + response.data[i].apellidoM, value: response.data[i].id  });
                }

            }).catch(error => {
                console.log(error);
            });

        },

        async obtenerCuentasDiarias(){

            await this.axios.get('/cuentadiaria').then((response) => {

                console.log("Cuentas diarias");
                console.log( response );
               
            }).catch(error => {
                console.log(error);
            });
            
            
        },
        editarCuentaDiaria(){

        },
        actualizarCuentaDiaria(){

        },
        async registrarCuentaDiaria() {

            await this.form.post('/cuentadiaria').then((response) => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Usuario guardado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                }) 
                $('#modalAgregarCuentaDiaria').modal('hide');
            }).catch(error => {
                console.log(error);
            });

        },
        abrirModalRegistroCuentaDiaria() {
            this.actualizarCuentaDiaria = false;
            //this.form.reset();
            //this.form.clear();
        },
        onClick() {
            this.visible = true;
        },
        modalClosed() {
            this.visible = false;
        },
    },
};
</script>

