<template>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-1">
                <div class="separator">Entrevista</div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id_ugi"> 
                        Defensor
                    </label>
                    <v-select v-model="form.id_defensor" :options="defensores"></v-select>
                </div>
                <div class="form-group col-md-6 ">
                    <label for="foja">
                        Fecha
                    </label>
                    <input type="date" v-model="form.fecha" class="form-control" id="foja" name="foja">
                </div>
                <div class="form-group col-md-12 ">
                    <label for="foja">
                        Observaciones
                    </label>
                    <textarea v-model="form.observaciones" class="form-control" id="observaciones" rows="3"></textarea>
                </div>
                <button type="button" class="btn btn-success float-right mb-1" @click="guardarEntrevista" > Guardar </button>
            </div>
            <div class="col-12">
                <div class="separator"></div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { ref } from "vue";
import "vue-select/dist/vue-select.css";
import Form from 'vform'
import Swal from 'sweetalert2'
export default {
    data() {
        return {
            form: new Form({
                id: '',
                id_defensor: '',
                fecha: '',
                observaciones: '',
                activo: '1',
            }),
            defensores: ref([]),
        }
    },
    mounted() {
        this.obtenerDefensores();
    },
    methods: {
        guardarEntrevista(){
            console.log("Se ha guardado con exito");
            console.log( "Id expediente " + this.$route.params.id );
            console.log( this.form );
        },
        async obtenerDefensores(){
            this.axios.get('/defensor').then((response) => {
                for (let i = 0; i < response.data.length; i++) {
                    const element = response.data[i];
                    this.defensores.push( { label: element.user.name, id: element.id } );
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
    border-bottom: 1px solid #000;
  }
  .separator:not(:empty)::before {
    margin-right: .25em;
  }
  .separator:not(:empty)::after {
    margin-left: .25em;
  }
</style>