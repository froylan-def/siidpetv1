<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Expediente  </h1>
                </div><!-- /.col -->
                
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="card">
                    <div class="card-header d-flex p-0">
                      <h3 class="card-title p-3"> <b> Foja: </b> {{ this.expediente.foja }} |  <b> Ugi: </b> {{ this.expediente.id_ugi }} | <b> Nuc: </b> {{ this.expediente.nuc }} </h3>
                      <ul class="nav nav-pills ml-auto p-2">
                        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab"> Entrevista </a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab"> Etapa 2 </a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab"> Etapa 3</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <!-- Componente de entrevista -->
                            <entrevista> </entrevista>
                            <!-- Fin componente de entrevista -->
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <form>
                                
                                

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_entrevista">ID Entrevista</label>
                                    <input type="text" class="form-control" id="id_entrevista" name="id_entrevista">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="nuc">NUC</label>
                                    <input type="text" class="form-control" id="nuc" name="nuc">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado">ID Imputado</label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado">ID Delito</label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado">ID Victima</label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado">ID Flagrancia</label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado">ID Flagrancia</label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado">Determinación MP</label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> id asignacion medidas</label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado">Acuerdo sede ministerial</label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado">Carpeta procesal</label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado">Audiencia inicial</label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado">Id Juez de control</label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado">Id defensor audiencia</label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado">Cita mecanismas </label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> Id acuerdo reparatorio </label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> Fecha formulacion imputacion </label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> fecha vinculacion proceso</label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> id delito proceso</label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> investigacion  complementaria </label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> Prorroga Plazo </label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> Medida cautelar </label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> Audiencia intermedia </label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> Suspención condicional proceso </label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> Procedimiento abreviado </label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> Jucio </label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> Tribunal enjuiciamiento </label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> Sentencia juicio </label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> Conclusion </label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> Visita carcelaria </label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> ID impugnación </label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="id_imputado"> orden aprehensión</label>
                                    <input type="text" class="form-control" id="id_imputado" name="id_imputado">
                                    </div>
                                </div>
    
    
                                <!-- Agrega los demás campos aquí según el mismo patrón -->
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>


                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                          ETAPA 3
                        </div>
                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                  <!-- ./card -->
            </div>
        </div>
    </div>
</template>

<script lang="ts">

import entrevista from './componentes/Entrevista.vue';

import { ref } from "vue";
import "vue-select/dist/vue-select.css";
import Form from 'vform'
import Swal from 'sweetalert2'
export default {
    components: {
        entrevista
    },
    data() {
        return {
            datos: [
                { text: "Nombres", value: "nombres" },
                { text: "Apellido Materno", value: "apellido_materno" },
                { text: "Apellido Paterno", value: "apellido_paterno" },
                { text: "Municipio", value: "municipio.nombre"},
                { text: "Sexo", value: "sexo"},
                { text: "Telefono", value: "telefono"},
                { text: "Opciones", value: "operation" },
            ],
            form: new Form({
                id: '',
                nombres: '',
                apellido_paterno: '',
                apellido_materno: '',
                id_municipio: '',
                telefono: '',
                sexo: '',
            }),
            expediente: ref({}),
        }
    },
    mounted() {
        this.obtenerExpediente();
    },
    methods: {
        obtenerExpediente() {
            this.axios.get('/expediente/' + this.$route.params.id ).then((response) => {
                this.expediente = response.data.expediente; 
            })
        }
    }
}
</script>
