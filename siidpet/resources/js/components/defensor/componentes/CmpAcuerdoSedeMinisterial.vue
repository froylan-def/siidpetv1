<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0"> Acuerdo sede ministerial </h5>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <small class="text-muted"> Porfavor llene los campos. Para ingresar una fecha da clic en el icono del calendario. </small>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        
                
                    <div class="row">

                        
                        
                        <div class="form-group col-md-6">
                            <label for="fecha_inicio"> Fecha inicio: </label>
                            <input type="date" v-model="form.fecha_inicio" class="form-control" id="fecha_inicio" name="fecha_inicio">
                            <div style="color: red;" v-if="form.errors.has('fecha_inicio')" v-html="form.errors.get('fecha_inicio')" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="fecha_fin"> Fecha fin: </label>
                            <input type="date" v-model="form.fecha_fin" class="form-control" id="fecha_fin" name="fecha_fin">
                            <div style="color: red;" v-if="form.errors.has('fecha_fin')" v-html="form.errors.get('fecha_fin')" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="id_estatus_sede_ministerial"> Estatus sede ministerial: </label>
                            <v-select v-model="this.form.id_estatus_sede_ministerial" :reduce="(option) => option.id" :options="opcionesSedes">
                            </v-select>
                            <div style="color: red;" v-if="form.errors.has('id_estatus_sede_ministerial')" v-html="form.errors.get('id_estatus_sede_ministerial')" /> 
                        </div>

                        <div class="form-group col-md-6">
                            <label for="fecha"> Fecha: </label>
                            <input type="date" v-model="form.fecha" class="form-control" id="fecha" name="fecha">
                            <div style="color: red;" v-if="form.errors.has('fecha')" v-html="form.errors.get('fecha')" />
                        </div>
                        
                        

                    </div>
                

                <div style="text-align: right;">
                    <div v-if="loading" class="spinner-border" role="status">
                        <span class="sr-only">Cargando...</span>
                    </div>

                    <button v-else-if="!loading && esNuevo" type="button" class="btn btn-primary float-right mb-1"
                        @click="guardarAcuerdoSedes"> <i class="fa-solid fa-floppy-disk"></i> Guardar </button>
                    <button v-else type="button" class="btn btn-primary float-right mb-1" @click="editarAcuerdoSedes">
                        <i class="fa-solid fa-pen-to-square"></i> Actualizar </button>
                </div>
            
    </div>
</template>

<script lang="ts">
import { ref } from "vue";
import Form from 'vform'
import Swal from 'sweetalert2'
import { registrarLog, obtenerCambios } from '../../../../utils/helpers';

export default {
    data() {
        return {
            form: new Form({
                id: '',
                medidas_de_proteccion: '',
                fecha_inicio: '',
                fecha_fin: '',
                id_estatus_sede_ministerial: '',
                fecha: '',
                activo: 1,
            }),
            esNuevo: ref(false),
            loading: ref(true),
            opcionesSedes: ref([]),
            originalData: ref({}),
        }
    },
    mounted() {
        this.obtenerAcuerdoSedes();
        this.obtenerSedes();
    },
    methods: {
        async obtenerSedes() {
            try {
                const response = await this.axios.get('/estatussedeministerial');
                this.opcionesSedes = response.data.estatussedeministerial
                .map(sede => ({
                    id: sede.id,
                    label: sede.nombre
                }));
            } catch (error) {
                console.error('Error fetching municipios:', error);
            }
        },

        obtenerAcuerdoSedes() {
            this.axios.get('/expediente/' + this.$route.params.id).then((response) => {
                if (response.data.expediente.id_acuerdo_sede_ministerial == null) {
                    this.esNuevo = true;
                } else {
                    this.axios.get('/acuerdosedeministerial/' + response.data.expediente.id_acuerdo_sede_ministerial)
                        .then(async (response) => {
                            await this.form.fill(response.data.acuerdosedeministerial);

                            this.originalData = JSON.parse(JSON.stringify( this.form.data() ));


                        })
                }
                this.loading = false;
            })
        },

        editarAcuerdoSedes() {
            this.form.errors.clear();
            let error = this.validarFomrulario();
            if(error){
                return
            }

            this.axios.put('/acuerdosedeministerial/' + this.form.id + '/', this.form).then((response) => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: response.data.mensaje,
                    showConfirmButton: false,
                    timer: 1500
                })
                this.loading = true;
                this.obtenerAcuerdoSedes();
                this.guardarLog(2);
            })
            
        },

        guardarAcuerdoSedes() {
            this.form.errors.clear();
            let error = this.validarFomrulario();
            if(error){
                return
            }
            this.form.post('/acuerdosedeministerial').then((response) => {
                this.axios.put('/expediente/' + this.$route.params.id, {
                    "id_acuerdo_sede_ministerial": response.data.acuerdosedeministerial.id
                }).then((response) => {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.data.mensaje,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.loading = true;
                    this.obtenerAcuerdoSedes();
                    this.guardarLog(1);
                })
            })
        },

        async guardarLog(tipo) {

            let mensaje = "";
            if (tipo == 1) {
                mensaje = "Se agregaron datos de Acuerdo sede ministerial"
            } else {
                mensaje = "Se editaron datos de Acuerdo sede ministerial"
            }

            let cambiado = await obtenerCambios(this.originalData, this.form.data());

            const tieneSede = cambiado.some(obj => obj.hasOwnProperty('id_estatus_sede_ministerial'));

            if(tieneSede){

                let nombreMedida = "";
                await this.axios.get('/estatussedeministerial/'+this.form.id_estatus_sede_ministerial).then((response) => {
                    nombreMedida = response.data.sede.nombre;
                })
                const index = cambiado.findIndex(obj => obj.hasOwnProperty('id_estatus_sede_ministerial'));
                if (index !== -1) {
                    cambiado[index].id_estatus_sede_ministerial = nombreMedida;
                }
            }

            const data = {
                id_defensor: window.defensor,
                accion: mensaje,
                descripcion: JSON.stringify(cambiado),
                id_registro: this.$route.params.id,
                tipo_registro: 3
            };
            registrarLog(data);

        },

        validarFomrulario(){
            let error = false;

            
            if( this.form.fecha_inicio === null || this.form.fecha_inicio === "" ){
                this.form.errors.set('fecha_inicio', 'Este campo es requerido');
                error = true; 
            }
            if( this.form.fecha_fin === null || this.form.fecha_fin === "" ){
                this.form.errors.set('fecha_fin', 'Este campo es requerido');
                error = true; 
            }
            if( this.form.id_estatus_sede_ministerial === null || this.form.id_estatus_sede_ministerial === "" ){
                this.form.errors.set('id_estatus_sede_ministerial', 'Este campo es requerido');
                error = true; 
            }
            if( this.form.fecha === null || this.form.fecha === "" ){
                this.form.errors.set('fecha', 'Este campo es requerido');
                error = true; 
            }

            let fechaInicio = new Date(this.form.fecha_inicio);
            let fechaFin = new Date(this.form.fecha_fin);

            if( fechaInicio.getTime() > fechaFin.getTime() ){
                this.form.errors.set('fecha_inicio', 'La fecha de inicio es mayor que la fecha fin');
                error = true;
            }

            return error;
        }
    }
}
</script>
