<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">NUC No. {{this.nuc}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active"> NSJPAO </li>
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
                    <div class="card-header border-0">
                        <h3 class="card-title">Imputados </h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                            </a>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario" @click="abrirModalRegistro">
                              <i class="fa-solid fa-folder-medical"></i>Agregar
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <span class="ml-2">Campo de busqueda: </span>
                                <select class="custom-select form-control-border ml-2" v-model="searchField">
                                    <option value="name">nombre</option>
                                    <option value="email">correo</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <span class=""> Valor: </span>
                                <input class="form-control form-control-border border-width-2 mr-2"
                                    v-model="searchValue" placeholder="Juanito perez" type="search"/>
                            </div>
                        </div>
                        
                        <EasyDataTable buttons-pagination 
                            :headers="headers" 
                            :items="items" 
                            :theme-color="themeColor"
                            :search-field="searchField" 
                            :search-value="searchValue"
                            >

                            <template #item-operation="item">
                            <div class="operation-wrapper">
                                 <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario" @click="abrirModalRegistro">
                               <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                                  <button class="btn btn-primary"   @click="eliminar(item)">
                             <i class="fa-solid fa-trash"></i>
                            </button>
                            <a>
                                    <button class="btn btn-primary"   @click="ver(item)" >
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </a>
                            
                            
      </div>
    </template>
    </EasyDataTable>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
        <!-- /.card-body -->
      </div>

        <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form @submit.prevent="registrarInputado" @keydown="form2.onKeydown($event)">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAgregarUsuario"> Agregar imputado </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                                <input type="hidden" name="_token" :value="csrf">
                                    
                                <div class="form-group">
                                    <label for="Nombre del usuario">Nombres</label>
                                    <input v-model="form2.nombres"  type="text" class="form-control" id="NUC"
                                        aria-describedby="emailHelp" placeholder="123456">
                                    <div style="color: red;" v-if="form2.errors.has('nombres')" v-html="form2.errors.get('nombres')" />
                                </div>

                                <div class="form-group">
                                    <label for="Nombre del usuario">Apellido Paterno</label>
                                    <input v-model="form2.apellidoP"  type="text" class="form-control" id="NUC"
                                        aria-describedby="emailHelp" placeholder="123456">
                                    <div style="color: red;" v-if="form2.errors.has('apellidoP')" v-html="form2.errors.get('apellidoP')" />
                                </div>

                                <div class="form-group">
                                    <label for="Nombre del usuario">Apellido Materno</label>
                                    <input v-model="form2.apellidoM"  type="text" class="form-control" id="NUC"
                                        aria-describedby="emailHelp" placeholder="123456">
                                    <div style="color: red;" v-if="form2.errors.has('apellidoM')" v-html="form2.errors.get('apellidoM')" />
                                </div>

                                <div class="form-group">
                                    <label for="Nombre del usuario">CURP</label>
                                    <input v-model="form2.CURP"  type="text" class="form-control" id="NUC"
                                        aria-describedby="emailHelp" placeholder="123456">
                                    <div style="color: red;" v-if="form2.errors.has('CURP')" v-html="form2.errors.get('CURP')" />
                                </div>
                                <div class="form-group">
                                    <label for="Correo del usuario">Municipio</label>
                                    <select  v-model="form2.IDMunicipio" type="text" class="form-control" id="correo">
                                        <option v-for=" municipio in municipios" :value="municipio.id">{{municipio.nombre}}</option>
                                    </select>
                                    <div style="color: red;" v-if="form2.errors.has('IDMunicipio')" v-html="form2.errors.get('IDMunicipio')" />
                                </div>
                                <div class="form-group">
                                    <label for="Nombre del usuario">Dirección</label>
                                    <input v-model="form2.direccion"  type="text" class="form-control" id="NUC"
                                        aria-describedby="emailHelp" placeholder="123456">
                                    <div style="color: red;" v-if="form2.errors.has('direccion')" v-html="form2.errors.get('direccion')" />
                                </div>
                                <div class="form-group">
                                    <label for="Nombre del usuario">Correo electrónico</label>
                                    <input v-model="form2.correo"  type="text" class="form-control" id="NUC"
                                        aria-describedby="emailHelp" placeholder="123456">
                                    <div style="color: red;" v-if="form2.errors.has('correo')" v-html="form2.errors.get('correo')" />
                                </div>
                                <div class="form-group">
                                    <label for="Nombre del usuario">Teléfono</label>
                                    <input v-model="form2.telefono"  type="text" class="form-control" id="NUC"
                                        aria-describedby="emailHelp" placeholder="123456">
                                    <div style="color: red;" v-if="form2.errors.has('telefono')" v-html="form2.errors.get('telefono')" />
                                </div>
                                                     
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> 
                                <i class="fas fa-times"></i> Cancelar
                            </button>
                            <button type="submit" :disabled="form2.busy" class="btn btn-primary">
                                <i class="fas fa-save"></i> Registrar
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
import type { Header, Item,ClickRowArgument  } from "vue3-easy-data-table";
import Form from 'vform'


const showRow = (item: ClickRowArgument) => {
    console.log("aaa")
};
export default {

    data(){
        return{

            nuc: this.$route.params.NUC,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            searchField:ref("name"),
            searchValue: ref(""),
            themeColor: "#AB0033",
            headers: [
                { text: "nombres", value: "nombres" },
                { text: "apellidoP", value: "apellidoP" },
                { text: "apellidoM", value: "apellidoM" },
                { text: "CURP", value: "CURP"  },
                { text: "direccion", value: "direccion"},
                { text: "correo", value: "correo"},
                { text: "telefono", value: "telefono"},
                { text: "Acciones", value: "operation"}
            ],
            items: [],
            municipios: [],
            form2: new Form({
                nombres: '',
                apellidoP: '',
                apellidoM: '',
                CURP: '',
                IDMunicipio: '',
                direccion: '',
                correo: '',
                telefono: '',
                IDNUC:''
            }),
            datosEtapa: new Form({
                idImputado: '',
                IDNUC: '',
                
            })
        }
    },
    mounted() {
        this.getList();
        this.getMunicipios();
      
       
    },
    methods: {
        abrirModalRegistro() {
            console.log("Se ha abierto el modal");
            this.form2.reset();
            this.form2.clear();
        },
       getList() {
            this.axios.get('/imputado/NUC/'+this.nuc).then((response) => {
                this.items = response.data;
                //console.log(response.data);
                
            })
           /* await this.IDNUC.get('/imputado').then((response) => {
                console.log(response);
            }).catch(error => {
                console.log(error);
            })*/
        },
        getMunicipios() {
            this.axios.get('/municipios').then((response) => {
                this.municipios = response.data;
                 
                 
            })
        },  
        eliminar(item) {
             console.log(item.id)
             this.axios.delete('/NUCs/'+item.id).then((response) => {
                 
                console.log(response);
                this.getList();
            })
        }, 
        
        ver(item) {
            window.location.href = " /nuc/ExpedienteImputado/"+item.id;
           
       }, 

        async registrarInputado () {
            this.form2.IDNUC=this.nuc;  
            await this.form2.post('/imputado').then((response) => {
                this.datosEtapa.idImputado=response.data
                
            this.getList();
            }).catch(error => {
                console.log(error);
            })
            
            this.getList();
            
            this.datosEtapa.IDNUC=this.nuc;  
           
            await  this.datosEtapa.post("/etapaProcesal", this.nota).then((response) => {
                    console.log(response.data)    
              
                }).catch(error => {
                    console.log(error);
                })
         
        }
    }
}
</script>
