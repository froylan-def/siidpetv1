<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0"> Audiencia Inicial </h5>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <small class="text-muted"> Porfavor llene los campos. Puede dejar un mensaje tan largo como le sea posible. </small>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="row">

                        <div class="form-group">
                            <label for="audiencia_inicial">Audiencia inicial</label>
                            
                            <textarea v-model="form.audiencia_inicial" class="form-control" 
                                id="audiencia_inicial" rows="3" aria-describedby="audiencia_inicial" placeholder=""></textarea>
                            
                            
                            <div style="color: red;" v-if="form.errors.has('audiencia_inicial')"
                                v-html="form.errors.get('audiencia_inicial')" />
                        </div>                      

                        <div v-if="loading" class="spinner-border" role="status">
                            <span class="sr-only">Cargando...</span>
                        </div>

                        <button v-else-if="!loading && esNuevo" type="button" class="btn btn-success float-right mb-1"
                            @click="guardarAudienciaInicial"> Guardar </button>
                        <button v-else type="button" class="btn btn-warning float-right mb-1" @click="editarAudienciaInicial">
                            Actualizar </button>

                    </div>
                </div>
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
            form: new Form({
                id: '',
                audiencia_inicial: ''
            }),
            esNuevo: ref(false),
            loading: ref(true),
        }
    },
    mounted() {
        this.obtenerAudienciaInicial();
    },
    methods: {

        obtenerAudienciaInicial() {
            this.axios.get('/expediente/' + this.$route.params.id).then((response) => {
                if ( response.data.expediente.audiencia_inicial  == null) {
                    this.esNuevo = true;
                } else {
                    this.form.fill({
                        id: response.data.expediente.id,
                        audiencia_inicial : response.data.expediente.audiencia_inicial
                    });
                }
                this.loading = false;
            })
        },

        editarAudienciaInicial() {

            this.form.errors.clear();
            let error = this.validarFomrulario();
            if(error){
                return
            }
            
            this.axios.put('/expediente/' + this.$route.params.id + '/', this.form).then((response) => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: response.data.mensaje,
                    showConfirmButton: false,
                    timer: 1500
                })
                this.loading = true;
                this.obtenerAudienciaInicial();
            })
        },

        guardarAudienciaInicial() {

            this.form.errors.clear();
            let error = this.validarFomrulario();
            if(error){
                return
            }

            this.axios.put('/expediente/' + this.$route.params.id +'/', this.form).then((response) => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: response.data.mensaje,
                    showConfirmButton: false,
                    timer: 1500
                })
                this.loading = true;
                this.obtenerAudienciaInicial();
            })
        },



        validarFomrulario(){
            let error = false;
            if( this.form.audiencia_inicial === null || this.form.audiencia_inicial === "" ){
                this.form.errors.set('audiencia_inicial', 'Este campo es requerido');
                error = true; 
            }
            return error;
        }



    }
}
</script>
