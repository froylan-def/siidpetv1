<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Expediente </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header d-flex p-0">    
                        <a  @click="this.$router.push('/expedientes')" class="cursor-pointer mt-3 mb-3 ml-3 " style="cursor: pointer;">
                            <i class="fa-solid fa-arrow-left"></i>
                            Volver a expedientes
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-6 text-left">
                                <small > Foja </small>
                            </div>
                            <div class="col-6 text-right">
                                <span class="badge" style="background-color: #af1e44">{{ expediente.foja }}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 text-left">
                                <small > UGI </small>
                            </div>
                            <div class="col-6 text-right">
                                <span class="badge" style="background-color: #af1e44">{{ expediente.id_ugi }} 
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 text-left">
                                <small > NUC </small>
                            </div>
                            <div class="col-6 text-right">
                                <span class="badge" style="background-color: #af1e44"> {{ expediente.nuc }} </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 text-left">
                                <small > Imputados </small>
                            </div>
                            <div class="col-12 text-right mt-2">

                                <span v-if="this.imputados.length == 0">No hay imputados registrados</span>
                                <table class="table table-small">
                                    
                                    <tbody>
                                      <tr v-for="imputado in this.imputados" :key="imputado.nombres">
                                        <td>{{ imputado.nombres }}
                                        {{ imputado.apellido_paterno }}
                                        {{ imputado.apellido_materno }}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 text-left">
                                <small > Victimas </small>
                            </div>
                            <div class="col-12 text-right mt-2">

                                <span v-if="this.imputados.length == 0">No hay victimas registrados</span>
                                <table class="table table-small">
                                    
                                    <tbody>
                                      <tr v-for="victima in this.victimas" :key="victima.nombres">
                                        <td>{{ victima.nombres }}
                                        {{ victima.apellido_paterno }}
                                        {{ victima.apellido_materno }}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>


                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-9">
                <!-- Custom Tabs -->
                <div class="card">
                    
                    <div class="nav-tabs-wrapper" style="overflow-x: auto; white-space: nowrap;" ref="tabsContainer">
                        

                        <button class="scroll-btn scroll-left" @click="scrollTabs(-100)">
                            &#10094;
                        </button>

                        <ul class="nav nav-tabs ml-auto p-2" style="flex-wrap: nowrap;">
                            <li class="nav-item">
                                <a @click="changeOption(1)" class="nav-link" :class="{ active: isActiveTab(1) }" href="#tab_1" data-toggle="tab">
                                     Entrevista
                                </a>
                            </li>

                            <li class="nav-item"><a @click="changeOption(2)" class="nav-link" :class="{ active: isActiveTab(2) }" href="#tab_2" data-toggle="tab">  Imputado</a></li>

                            <li class="nav-item"><a @click="changeOption(3)" class="nav-link" :class="{ active: isActiveTab(3) }" href="#tab_3" data-toggle="tab">
                                
                                Delito</a>
                            </li>
                            
                            <li class="nav-item"><a @click="changeOption(4)" class="nav-link" :class="{ active: isActiveTab(4) }" href="#tab_4" data-toggle="tab">
                                
                                Victima</a>
                            </li>
                            
                            <li class="nav-item"><a @click="changeOption(5)" class="nav-link" :class="{ active: isActiveTab(5) }" href="#tab_5" data-toggle="tab">
                                
                                Flagrancia</a>
                            </li>

                            <li class="nav-item"><a @click="changeOption(6)" class="nav-link" :class="{ active: isActiveTab(6) }" href="#tab_6" data-toggle="tab">
                                
                                

                                Determinación MP</a></li>
                            <li class="nav-item"><a @click="changeOption(7)" class="nav-link" :class="{ active: isActiveTab(7) }" href="#tab_7" data-toggle="tab">
                                
                                

                                Asignación de medidas</a></li>
                            <li class="nav-item"><a @click="changeOption(8)" class="nav-link" :class="{ active: isActiveTab(8) }" href="#tab_8" data-toggle="tab">
                                
                                

                                Acuerdo sede ministerial</a></li>
                            <li class="nav-item"><a @click="changeOption(9)" class="nav-link" :class="{ active: isActiveTab(9) }" href="#tab_9" data-toggle="tab">
                                
                                
                                

                                Carpeta procesal</a></li>
                            <li class="nav-item"><a @click="changeOption(10)" class="nav-link" :class="{ active: isActiveTab(10) }" href="#tab_10" data-toggle="tab">
                                
                                


                                Audiencia inicial</a></li>
                            <li class="nav-item"><a @click="changeOption(11)" class="nav-link" :class="{ active: isActiveTab(11) }" href="#tab_11" data-toggle="tab">
                                


                                Juez de control</a></li>
                            <li class="nav-item"><a @click="changeOption(12)" class="nav-link" :class="{ active: isActiveTab(12) }" href="#tab_12" data-toggle="tab">
                                

                                Defensor en audiencia</a></li>
                            <li class="nav-item"><a @click="changeOption(13)" class="nav-link" :class="{ active: isActiveTab(13) }" href="#tab_13" data-toggle="tab">
                                

                                Cita mecanismos</a></li>
                            <li class="nav-item"><a @click="changeOption(14)" class="nav-link" :class="{ active: isActiveTab(14) }" href="#tab_14" data-toggle="tab">
                                
                                Acuerdo reparatorio</a></li>
                            <li class="nav-item"><a @click="changeOption(15)" class="nav-link" :class="{ active: isActiveTab(15) }" href="#tab_15" data-toggle="tab">
                                
                                Imputación</a></li>
                        </ul>

                        <!-- Botón para desplazar a la derecha -->
                        <button class="scroll-btn scroll-right" @click="scrollTabs(100)">
                            &#10095;
                        </button>



                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            
                            <div class="tab-pane" :class="{ active: isActiveTab(1) }" id="tab_1">
                                <entrevista></entrevista>
                            </div>
                            <div class="tab-pane" :class="{ active: isActiveTab(2) }" id="tab_2">
                                <CmpImputados @llamar-funcion="obtenerExpediente"></CmpImputados>
                            </div>
                            <div class="tab-pane" :class="{ active: isActiveTab(3) }" id="tab_3">
                                <CmpDelito></CmpDelito>
                            </div>
                            <div class="tab-pane" :class="{ active: isActiveTab(4) }" id="tab_4">
                                <CmpVictima @llamar-funcion="obtenerExpediente"></CmpVictima>
                            </div>
                            <div class="tab-pane" :class="{ active: isActiveTab(5) }" id="tab_5">
                                <CmpFlagrancia></CmpFlagrancia>
                            </div>
                            <div class="tab-pane" :class="{ active: isActiveTab(6) }" id="tab_6">
                                <CmpDeterminacion></CmpDeterminacion>
                            </div>
                            <div class="tab-pane" :class="{ active: isActiveTab(7) }" id="tab_7">
                                <CmpAsignacionMedidas></CmpAsignacionMedidas>
                            </div>
                            <div class="tab-pane" :class="{ active: isActiveTab(8) }" id="tab_8">
                                <CmpAcuerdoSedeMinisterial></CmpAcuerdoSedeMinisterial>
                            </div>
                            <div class="tab-pane" :class="{ active: isActiveTab(9) }" id="tab_9">
                                <CmpCarpetaProcesal></CmpCarpetaProcesal>
                            </div>
                            <div class="tab-pane" :class="{ active: isActiveTab(10) }" id="tab_10">
                                <CmpAudienciaInicial></CmpAudienciaInicial>
                            </div>
                            <div class="tab-pane" :class="{ active: isActiveTab(11) }" id="tab_11">
                                <CmpJuezControl></CmpJuezControl>
                            </div>
                            <div class="tab-pane" :class="{ active: isActiveTab(12) }" id="tab_12">
                                <CmpDefensorAudicencia></CmpDefensorAudicencia>
                            </div>
                            <div class="tab-pane" :class="{ active: isActiveTab(13) }" id="tab_13">
                                <CmpCitaMecanismos></CmpCitaMecanismos>
                            </div>
                            <div class="tab-pane" :class="{ active: isActiveTab(14) }" id="tab_14">
                                <CmpAcuerdoReparatorio></CmpAcuerdoReparatorio>
                            </div>
                            <div class="tab-pane" :class="{ active: isActiveTab(15) }" id="tab_15">
                               <CmpImputadacion></CmpImputadacion>
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- ./card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</template>

<script>

import { ref } from "vue";
import entrevista from './componentes/Entrevista.vue';
import CmpImputados from './componentes/CmpImputados.vue';
import CmpDelito from './componentes/CmpDelitos.vue';
import CmpVictima from './componentes/CmpVictima.vue';
import CmpFlagrancia from './componentes/CmpFlagrancia.vue';
import CmpDeterminacion from './componentes/CmpDeterminacionMP.vue';
import CmpAsignacionMedidas from './componentes/CmpAsignacionMedidas.vue';
import CmpAcuerdoSedeMinisterial from './componentes/CmpAcuerdoSedeMinisterial.vue';
import CmpCarpetaProcesal from './componentes/CmpCarpetaProcesal.vue';
import CmpAudienciaInicial from './componentes/CmpAudienciaInicial.vue';
import CmpJuezControl from './componentes/CmpJuezControl.vue';
import CmpDefensorAudicencia from './componentes/CmpDefensorAudiencia.vue';
import CmpCitaMecanismos from './componentes/CmpCitaMecanismos.vue';
import CmpAcuerdoReparatorio from './componentes/CmpAcuerdoReparatorio.vue';

import CmpImputadacion from './componentes/CmpImputacion.vue';


export default {
    name: 'ExpedienteTabs',
    components: {
        entrevista,
        CmpImputados,
        CmpDelito,
        CmpVictima,
        CmpFlagrancia,
        CmpDeterminacion,
        CmpAsignacionMedidas,
        CmpAcuerdoSedeMinisterial,
        CmpCarpetaProcesal,
        CmpAudienciaInicial,
        CmpJuezControl,
        CmpDefensorAudicencia,
        CmpCitaMecanismos,
        CmpAcuerdoReparatorio,
        CmpImputadacion
    },
    data() {
        return {
            activeTab: 1,
            expediente: {
                foja: '',
                id_ugi: '',
                nuc: '',
            },
            imputados: [],
            victimas: [],
        };
    },
    watch: {
        '$route' (to, from) {
            this.menu = to.query.m;
        }
    },
    mounted() {
        this.obtenerExpediente();
    },
    methods: {
        scrollTabs(distance) {
            const container = this.$refs.tabsContainer;
            container.scrollBy({
            left: distance,
            behavior: 'smooth'
            });
        },

        async obtenerExpediente() {
            this.axios.get('/expediente/' + this.$route.params.id).then((response) => {
                this.expediente = response.data.expediente;
            });

            this.imputados = [];
            await this.axios.get('/imputadosPorExpediente/'+ this.$route.params.id +'/' ).then((response) => {
                this.imputados = response.data;
            })

            this.victimas = [];
            await this.axios.get('/victimasPorExpediente/'+ this.$route.params.id +'/' ).then((response) => {
                this.victimas = response.data;
            })

        },
        changeOption(option) {
            this.activeTab = option;
        },
        isActiveTab(tabNumber) {
            return this.activeTab === tabNumber;
        }
    }
};
</script>

<style scoped>
.nav-item {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    background-color: #f8f9fa;
    margin-right: 2px;
}

.nav-link {
    padding: 10px 15px;
    color: #495057;
}

.nav-link:hover {
    background-color: #e9ecef;
}

.nav-link.active {
    background-color: #e9ecef;
    color: #495057;
}

.table-small {
    font-size: 12px; /* Ajusta el tamaño según tus necesidades */
}

.scroll-btn {
    background: none;
    border: none;
    font-size: 25px;
    cursor: pointer;
    padding: 10px;
    position: absolute;
    top: 0; /* Poner el botón en la parte superior */
    display: flex;
    justify-content: center; /* Centrar horizontalmente el ícono */
    align-items: flex-start; /* Alinear el ícono al inicio (arriba) */
    height: 20%; /* Ocupar todo el alto del contenedor */
    z-index: 1;
  }
  .scroll-left {
    left: 0;
  }
  .scroll-right {
    right: 0;
  }

  
</style>