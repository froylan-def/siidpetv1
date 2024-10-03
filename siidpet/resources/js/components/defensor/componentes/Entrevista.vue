<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0"> Entrevista</h5>
                </div>
            </div>
            <small class="text-muted"> Registra todos los datos campos. Los * son obligatorios </small>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="form-row">
                <div class="form-group col-md-6"> 
                    Defensor *
                    <v-select
                        :options="defensores"
                        v-model="form.id_defensor"
                        label="label"
                        :reduce="defensor => defensor.id"
                    ></v-select>

                    <div style="color: red;" v-if="this.form.errors.has('id_defensor')"
                                    v-html="this.form.errors.get('id_defensor')" /> 

                </div>
                <div class="form-group col-md-6 ">
                    Fecha *
                    <input type="date" v-model="form.fecha" class="form-control" id="fecha" name="fecha">

                    <div style="color: red;" v-if="this.form.errors.has('fecha')"
                                    v-html="this.form.errors.get('fecha')" />


                </div>
                <div class="form-group col-md-12 ">
                    Observaciones
                    <textarea v-model="form.observaciones" class="form-control" id="observaciones" rows="3"></textarea>


                    <div style="color: red;" v-if="this.form.errors.has('observaciones')"
                                    v-html="this.form.errors.get('observaciones')" /> 
                </div>

                <div v-if="loading" class="spinner-border" role="status">
                    <span class="sr-only">Cargando...</span>
                </div>

                <button v-else-if="!loading && esNuevo" type="button" class="btn btn-success float-right mb-1" @click="guardarEntrevista" > Guardar </button>
                <button v-else type="button" class="btn btn-warning float-right mb-1" @click="editarEntrevista" > Actualizar </button>

            </div>
        </div>
    </div>
</template>

<script lang="ts">
import vSelect from "vue-select";
import { ref } from "vue";
import "vue-select/dist/vue-select.css";
import Form from 'vform'
import Swal from 'sweetalert2'
export default {
    data() {
        return {
            form: new Form({
                id: '',
                id_defensor: ref(''),
                fecha: '',
                observaciones: '',
                activo: '1',
            }),
            defensores: ref([]),
            esNuevo: ref(true),
            loading: ref(true),
        }
    },
    mounted() {
        this.obtenerDefensores();
        this.obtenerEntrevista();
    },
    methods: {
        obtenerEntrevista(){
            this.axios.get('/expediente/' + this.$route.params.id ).then((response) => {
                
                if ( response.data.expediente.id_entrevista === null) {
                    this.esNuevo = true;
                }else{
                    this.esNuevo = false;
                    this.axios.get('/entrevista/'+ response.data.expediente.id_entrevista)
                    .then((response) => {
                        // this.form = response.data.entrevista;
                        this.form.fill(
                            response.data.entrevista
                        );
                    })
                }
                this.loading = false;
            })
        },
        editarEntrevista(){
            let error = false;
            if( this.form.id_defensor === "" || this.form.id_defensor === null ){
                this.form.errors.set('id_defensor', 'Este campo es requerido.');
                error = true;
            }else{
                this.form.errors.clear('id_defensor');
            }
            
            if( this.form.fecha === "" || this.form.fecha === null ){
                this.form.errors.set('fecha', 'Este campo es requerido');
                error = true;
            }else{
                this.form.errors.clear('fecha');
            }
            
            if(!error){
                this.axios.put('/entrevista/'+this.form.id, this.form).then((response) => {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.data.mensaje,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.obtenerEntrevista();
                    this.form.errors.clear();
                })
            }
            
        },
        guardarEntrevista(){
            this.form.post('/entrevista').then((response) => {
                this.axios.put('/expediente/'+this.$route.params.id, {
                    "id_entrevista": response.data.entrevista.id
                } ).then((response) => {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.data.mensaje,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.obtenerEntrevista();
                })
            })
        },
        async obtenerDefensores(){
            this.axios.get('/defensor').then((response) => {
                for (let i = 0; i < response.data.length; i++) {
                    const element = response.data[i];
                    this.defensores.push( {id: element.id, label: element.user.name} );
                }
            })
        },
    }
}
</script>
<style>
.separator {
    display: flex;
    align-items: center;
    text-align: center;
  }
  .separator::before,
  .separator::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid rgba(0,0,0,.2);
  }
  .separator:not(:empty)::before {
    margin-right: .25em;
  }
  .separator:not(:empty)::after {
    margin-left: .25em;
  }
  ::-webkit-scrollbar {
    width: 12px; 
  }
  ::-webkit-scrollbar-track {
    background: #f1f1f1;
  }
  ::-webkit-scrollbar-thumb {
    background-color: #888; 
    border-radius: 10px; 
    border: 2px solid #f1f1f1;
  }
  ::-webkit-scrollbar-thumb:hover {
    background: #cfd0d1; 
  }

</style>