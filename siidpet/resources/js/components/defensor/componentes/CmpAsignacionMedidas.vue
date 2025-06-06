<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0"> Asignación medidas de protección </h5>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <small class="text-muted"> Porfavor llene los campos. Para ingresar una fecha da clic en el icono del calendario. </small>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        
                
        <div class="row">
            
            <div class="form-group col-md-4">
                <label for="fecha_inicio">Fecha inicio</label>
                <input type="date" v-model="form.fecha_inicio" class="form-control" id="fecha_inicio" name="fecha_inicio">
                <div style="color: red;" v-if="form.errors.has('fecha_inicio')"
                    v-html="form.errors.get('fecha_inicio')" />
            </div>
            <div class="form-group col-md-4">
                <label for="fecha_vencimiento">Fecha vencimiento</label>
                <input type="date" v-model="form.fecha_vencimiento" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento">
                <div style="color: red;" v-if="form.errors.has('fecha_vencimiento')"
                    v-html="form.errors.get('fecha_vencimiento')" />
            </div>
            <div class="form-group col-md-4">
                <label for="id_medida_proteccion">Medida protección: </label>
                <v-select v-model="this.form.id_medida_proteccion" :reduce="(option) => option.id"
                    :options="medidasOpciones">
                </v-select>
                <div style="color: red;" v-if="form.errors.has('id_medida_proteccion')"
                    v-html="form.errors.get('id_medida_proteccion')" /> 
            </div>

            <div class="form-group col-md-12">
                <label for="observaciones">Observaciones: </label>
                <textarea v-model="form.observaciones" class="form-control" 
                id="observaciones" name="observaciones" rows="3" aria-describedby="determinacion_mp" placeholder=""></textarea>

                <div style="color: red;" v-if="form.errors.has('observaciones')"
                    v-html="form.errors.get('observaciones')" />
            </div>

            
            
        </div>
        
        <div style="text-align: right;">
            <div v-if="loading" class="spinner-border" role="status">
                <span class="sr-only">Cargando...</span>
            </div>
            <button v-else-if="!loading && esNuevo" type="button" class="btn btn-primary float-right mb-1"
                @click="guardarAsignacionMedidas"> <i class="fa-solid fa-floppy-disk"></i> Guardar </button>
            <button v-else type="button" class="btn btn-primary float-right mb-1" @click="editarAsignacionMedidas">
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
                fecha_inicio: '',
                fecha_vencimiento: '',
                id_medida_proteccion: '',
                activo: 1,
                observaciones: '',
            }),
            esNuevo: ref(false),
            loading: ref(true),
            medidasOpciones: ref([]),
            originalData: ref({}),
        }
    },
    mounted() {
        this.obtenerAsignacionMedidas();
        this.obtenerMedidasProteccion();
    },
    methods: {
        async obtenerMedidasProteccion() {
            try {
                const response = await this.axios.get('/medidasprotecciones');
                this.medidasOpciones = response.data.map(medida => ({
                    id: medida.id,
                    label: medida.nombre
                }));

            } catch (error) {
                console.error('Error fetching municipios:', error);
            }
        },

        obtenerAsignacionMedidas() {
            this.axios.get('/expediente/' + this.$route.params.id).then((response) => {
                if (response.data.expediente.id_asignacion_medidas == null) {
                    this.esNuevo = true;
                } else {
                    this.axios.get('/asignacionmedidas/' + response.data.expediente.id_asignacion_medidas)
                        .then( async (response) => {
                            await this.form.fill(response.data.asignacionmedidas);

                            this.originalData = JSON.parse(JSON.stringify( this.form.data() ));
                        })
                }
                this.loading = false;
            })
        },

        editarAsignacionMedidas() {
            this.form.errors.clear();
            let error = this.validarFomrulario();
            if(error){
                return
            }

            this.axios.put('/asignacionmedidas/' + this.form.id + '/', this.form).then((response) => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: response.data.mensaje,
                    showConfirmButton: false,
                    timer: 1500
                })
                this.loading = true;
                this.obtenerAsignacionMedidas();
                this.guardarLog(2);
            })
        },

        guardarAsignacionMedidas() {

            this.form.errors.clear();
            let error = this.validarFomrulario();
            if(error){
                return
            }
            
            this.form.post('/asignacionmedidas').then((response) => {
                this.axios.put('/expediente/' + this.$route.params.id, {
                    "id_asignacion_medidas": response.data.asignacionmedidas.id
                }).then((response) => {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.data.mensaje,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.loading = true;
                    this.obtenerAsignacionMedidas();

                    this.guardarLog(1);
                })
            })
        },


        validarFomrulario(){

            let error = false;

            if( this.form.fecha_inicio === null || this.form.fecha_inicio === "" ){
                this.form.errors.set('fecha_inicio', 'Este campo es requerido');
                error = true; 
            }

            if( this.form.fecha_vencimiento === null || this.form.fecha_vencimiento === "" ){
                this.form.errors.set('fecha_vencimiento', 'Este campo es requerido');
                error = true; 
            }

            if( this.form.id_medida_proteccion === null || this.form.id_medida_proteccion === "" ){
                this.form.errors.set('id_medida_proteccion', 'Este campo es requerido');
                error = true; 
            }

            return error;
        },


        async guardarLog(tipo) {

            let mensaje = "";
            if (tipo == 1) {
                mensaje = "Se agregaron datos de Asignacion Medidas"
            } else {
                mensaje = "Se editaron datos de Asignacion Medidas"
            }

            let cambiado = await obtenerCambios(this.originalData, this.form.data());

            const tieneIdMedida = cambiado.some(obj => obj.hasOwnProperty('id_medida_proteccion'));

            if(tieneIdMedida){

                let nombreMedida = "";
                await this.axios.get('/medidaproteccion/'+this.form.id_medida_proteccion).then((response) => {
                    nombreMedida = response.data.medida.nombre;
                })
                const index = cambiado.findIndex(obj => obj.hasOwnProperty('id_medida_proteccion'));
                if (index !== -1) {
                    cambiado[index].id_medida_proteccion = nombreMedida;
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

        }


    }
}
</script>
