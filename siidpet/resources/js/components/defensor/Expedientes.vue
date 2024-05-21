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
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarExpediente" @click="abrirModalRegistro">
                                <i class="fa-solid fa-circle-plus"></i> Nuevo
                            </button>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <a class="text-right mb-2" data-toggle="collapse" href="#collapseExample" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-6 ">
                                            <span class="">Buscar por: </span>
                                            <select class="custom-select " v-model="searchField">
                                                <option value="foja">foja</option>
                                                <option value="id_ugi">ugi</option>
                                                <option value="nuc">nuc</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <span class=""> Valor: </span>
                                            <input class="form-control  border-width-2 mr-2" v-model="searchValue"
                                                :placeholder=searchField type="search" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <EasyDataTable buttons-pagination :headers="datos" :items="items"
                            :search-field="searchField" :search-value="searchValue" alternating>
                            <template #item-operation="item" >
                                <div class="operation-wrapper">
                                    <a class="btn text-warning" @click="actualizarExpediente(item)">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a class="btn text-primary "  @click="irADetalles(item)">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </div>
                            </template>
                        </EasyDataTable>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalAgregarExpediente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form
                    @submit.prevent="actualizarExpedienteCheck === false ? registrarExpediente : editarExpediente">
                        <div class="modal-header">
                            <h5 v-if="actualizarExpedienteCheck" class="modal-title" id="modalAgregarExpediente"> Actualizar expediente </h5>
                            <h5 v-else class="modal-title" id="modalAgregarExpediente" > Nuevo expediente </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="foja">Foja</label>
                                <input v-model="form.foja" type="text" class="form-control" id="foja"
                                    aria-describedby="emailHelp" placeholder="foja">
                                <div style="color: red;" v-if="form.errors.has('foja')" v-html="form.errors.get('foja')" />
                            </div>
                            <div class="form-group">
                                <label for="ugi">UGI</label>
                                <v-select 
                                    v-model="form.id_ugi"
                                    :reduce="(option) => option.id" :options="ugis" >

                                </v-select>
                                {{ form.id_ugi }}
                                <div style="color: red;" v-if="form.errors.has('ugi')" v-html="form.errors.get('ugi')" />
                            </div>
                            <div class="form-group">
                                <label for="nuc">NUC</label>
                                <input v-model="form.nuc" type="text" class="form-control" id="nuc"
                                    aria-describedby="emailHelp" placeholder="nuc">
                                <div style="color: red;" v-if="form.errors.has('nuc')" v-html="form.errors.get('nuc')" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="fas fa-times"></i> Cancelar
                            </button>
                            
                            <button v-if="actualizarExpedienteCheck" :disabled="form.busy" class="btn btn-warning" @click="editarExpediente">
                                <i class="fas fa-save"></i> Actualizar
                            </button>

                            <button v-else :disabled="form.busy" class="btn btn-success" @click="registrarExpediente">
                                <i class="fas fa-save"></i> Guardar
                            </button>


                        </div>
                    </form>
                </div>
            </div>
        </div>
</template>

<script lang="ts">
import { ref } from "vue";
import Form from 'vform'
import Swal from 'sweetalert2'
export default {
    data() {
        return {
            searchField: ref("name"),
            searchValue: ref(""),
            datos: [
                { text: "FOJA", value: "foja",  sortable: true, align: 'center'},
                { text: "UGI", value: "ugi.nombre",  sortable: true },
                { text: "NUC", value: "nuc",  sortable: true},
                { text: "Editar", value: "operation",  sortable: true,  width: 200},
            ],
            items: [],
            form: new Form({
                fecha_vinculacion_proceso: null,
                flagrancia: null,
                foja: null,
                id: null,
                id_acuerdo_reparatorio: null,
                id_acuerdo_sede_ministerial: null,
                id_asignacion_medidas: null,
                id_conclusion: null,
                id_defensor: null,
                id_defensor_audiencia: null,
                id_delito: null,
                id_delito_proceso: null,
                id_entrevista: null,
                id_flagrancia: null,
                id_impugnacion: null,
                id_imputado: null,
                id_investigacion_complementaria: null,
                id_juez_control: null,
                id_medida_cautelar: null,
                id_orden_aprencion: null,
                id_procedimiento_abreviado: null,
                id_prorroga_plazo: null,
                id_suspencion_condicional_proceso: null,
                id_tribunal_enjuiciamiento: null,
                id_ugi: null,
                id_victima: null,
                impugnacion: null,
                imputado: null,
                investigacioncomplementaria: null,
                juez: null,
                juicio: null,
                medidacautelar: null,
                nuc: null,
                ordenaprencion : null,
                procedimientoabreviado: null,
                prorrogaplazoinvestigacioncomplementaria: null,
                sentencia_juicio: null,
                suspencioncondicionalproceso: null,
                tribunalenjuiciamiento: null,
                ugi: null,
                updated_at : null,
                victima: null,
                visita_carcelaria: null,
            }),
            ugiOptions: [],
            actualizarExpedienteCheck: ref(false),
        }
    },
    mounted() {
        this.obtenerExpedientes();
        this.obtenerUgis();
    },
    methods: {

        cambioUgi(value){

            console.log("Cambio select ugi");
        },
        async editarExpediente(){

            await this.form.put('/expediente/' + this.form.id, this.form).then((response) => {
                this.obtenerDefensores();
                $('#modalAgregarExpediente').modal('hide');

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Expediente actualizado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                })
            }).catch(error => {
                console.log(error);
            });

        },
        actualizarExpediente(expediente){
            console.log("Expediente");
            console.log( expediente );
            
            $('#modalAgregarExpediente').modal('show');
            this.form.fill(expediente);
            this.actualizarExpedienteCheck = true;
            
        },
        async obtenerUgis(){
            this.axios.get('/ugi').then((response) => {
                for (let i = 0; i < response.data.length; i++) {
                    const element = response.data[i];
                    this.ugiOptions.push( { label: element.nombre, value: element.id } );
                }
            })
        },
        abrirModalRegistro(){
            this.actualizarExpedienteCheck = false;
            this.form.reset();
            this.form.clear();
        },
        registrarExpediente(){
            this.form.id_ugi = this.form.id_ugi.id;
            this.form.post('/expediente').then((response) => {
                this.obtenerExpedientes();
            })
            $('#modalAgregarExpediente').modal('hide');
        },
        obtenerExpedientes() {
            this.axios.get('/expediente').then( (response) => {
                this.items = response.data;
            })
        },
        irANuevo(){
            this.$router.push('/expedientes/new');
        },
        async irADetalles(item) {
            this.$router.push('/expedientes/' + item.id);
        },
    }
}

</script>
<style>
.style-chooser .vs__search::placeholder,
.style-chooser .vs__dropdown-toggle,
.style-chooser .vs__dropdown-menu {
  background: #dfe5fb;
  border: none;
  color: #394066;
  text-transform: lowercase;
  font-variant: small-caps;
}

.style-chooser .vs__clear,
.style-chooser .vs__open-indicator {
  fill: #394066;
}
</style>