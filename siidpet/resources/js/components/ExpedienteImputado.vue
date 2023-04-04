<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Expediente Imputado ....</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Expediente</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <!--%%%%%%%Preeliminar%%%%%%%-->

        <div :class="claseEstados[0]">
            <div class="card-header">
                <h3 class="card-title">Preeliminar</h3>
                <div v-if="estados[0] != 0" class="card-tools">
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="collapse"
                        title="Collapse"
                    >
                        <i class="fas fa-minus"></i>
                    </button>
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="maximize"
                        title="Collapse"
                    >
                        <i class="fa fa-maximize"></i>
                    </button>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="card-body table-responsive p-0">
                    <div class="col-md-9 mb-2 w-100">
                        <button
                            class="btn btn-primary"
                            @click="finalizarEtapa(1)"
                        >
                            <i class="fa-solid fa-eye"></i> Siguiente Etapa
                        </button>
                    </div> 
                    <div class="form-group">
                        <div class="col-md-9 mb-2 w-100">
                            <h5>Bitacora</h5>
                            <div v-if="estados[0] == 1">
                                <label>Agregar nota</label>
                                <textarea
                                    name="Text1"
                                    v-model="nota.texto"
                                    class="form-control"
                                    cols="70"
                                    rows="5"
                                ></textarea>
                                <button
                                    class="btn btn-primary"
                                    @click="registrarNota(1)"
                                >
                                    <i class="fa-solid fa-eye"></i> Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                    <EasyDataTable
                        buttons-pagination
                        :headers="headers"
                        :items="itemsPreeliminar"
                        :theme-color="themeColor"
                    >
                        <template #item-operation="item">
                            <div class="operation-wrapper">
                                <button
                                    class="btn btn-primary"
                                    data-toggle="modal"
                                    data-target="#modalAgregarUsuario"
                                    @click="abrirModalRegistro"
                                >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button
                                    class="btn btn-primary"
                                    @click="eliminar(item)"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </template>
                    </EasyDataTable>
                </div>
            </div>
        </div>

        <!-- %%%%%%%Audiencia inicial%%%%%%%-->

        <div :class="claseEstados[1]">
            <div class="card-header">
                <h3 class="card-title">Audiencia inicial</h3>
                <div v-if="estados[1] != 0" class="card-tools">
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="collapse"
                        title="Collapse"
                    >
                        <i class="fas fa-minus"></i>
                    </button>
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="maximize"
                        title="Collapse"
                    >
                        <i class="fa fa-maximize"></i>
                    </button>
                </div>
            </div>

            <div class="card-body table-responsive ">
                <div class="form-group">
                    <div>
                        <div class="col-md-12 mb-2 w-100">
                            <div class="row">
                                <div class="col-8" >
                                <button
                                class="btn btn-primary"
                                @click="finalizarEtapa(2)">
                                <i class="fa-solid fa-eye"></i> Siguiente Etapa
                                </button>
                                </div>
                                <div class="col-4" style=" border-style: solid;">
                                    <label >MASC</label>
                                    <div class="row">
                                        <div class="col-4 mb-2 w-100" >
                                            <button
                                            class="btn btn-primary btn-sm"
                                            @click="finalizarEtapa(2)"> 
                                                Reparación de Daños
                                            </button>
                                        </div>
                                        
                                        <div class="col-4 mb-2 w-100"  >
                                            <button
                                            class="btn btn-primary btn-sm"
                                            @click="finalizarEtapa(2)">
                                                Etapa
                                            </button>
                                        </div>
                                        <div class="col-4 mb-2 w-100"  >
                                            <button
                                            class="btn btn-primary btn-sm"
                                            @click="finalizarEtapa(2)">
                                                Etapa
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5>Bitacora</h5>
                        <div v-if="estados[1] == 1">
                            <label>Agregar nota</label>
                            <textarea
                                name="Text1"
                                v-model="nota.texto"
                                class="form-control"
                                cols="70"
                                rows="5"
                            ></textarea>
                            <button
                                class="btn btn-primary"
                                @click="registrarNota(2)">
                                <i class="fa-solid fa-eye"></i> Agregar
                            </button>
                        </div>

                        <EasyDataTable
                            buttons-pagination
                            :headers="headers"
                            :items="itemsAudienciaInicial"
                            :theme-color="themeColor">
                            <template #item-operation="item">
                                <div class="operation-wrapper">
                                    <button
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        data-target="#modalAgregarUsuario"
                                        @click="abrirModalRegistro"
                                    >
                                        <i
                                            class="fa-solid fa-pen-to-square"
                                        ></i>
                                    </button>
                                    <button
                                        class="btn btn-primary"
                                        @click="eliminar(item)"
                                    >
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </template>
                        </EasyDataTable>
                    </div>
                </div>
            </div>
        </div>

        <!--%%%%%%%Vinculacion a proceso%%%%%%%-->

        <div :class="claseEstados[2]">
            <div class="card-header">
                <h3 class="card-title">Vinculacion a proceso</h3>
                <div v-if="estados[2] != 0" class="card-tools">
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="collapse"
                        title="Collapse"
                    >
                        <i class="fas fa-minus"></i>
                    </button>
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="maximize"
                        title="Collapse"
                    >
                        <i class="fa fa-maximize"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
              <div class="col-md-9 mb-2 w-100">
                            <br />
                            <button
                                class="btn btn-primary"
                                @click="finalizarEtapa(3)"
                            >
                                <i class="fa-solid fa-eye"></i> Siguiente Etapa
                            </button>
                        </div>
                <h5>Bitacora</h5>
                <div v-if="estados[2] == 1">
                    <label>Agregar nota</label>
                    <textarea
                        name="Text1"
                        v-model="nota.texto"
                        class="form-control"
                        cols="70"
                        rows="5"
                    ></textarea>
                    <button class="btn btn-primary" @click="registrarNota(3)">
                        <i class="fa-solid fa-eye"></i> Agregar
                    </button>
                </div>

                <EasyDataTable
                    buttons-pagination
                    :headers="headers"
                    :items="itemsVinculacionAProceso"
                    :theme-color="themeColor"
                    :search-field="searchField"
                    :search-value="searchValue"
                >
                    <template #item-operation="item">
                        <div class="operation-wrapper">
                            <button
                                class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#modalAgregarUsuario"
                                @click="abrirModalRegistro"
                            >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button
                                class="btn btn-primary"
                                @click="eliminar(item)"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </template>
                </EasyDataTable>
            </div>
        </div>

        <!--%%%%%%%Etapa intermedia%%%%%%%-->

        <div :class="claseEstados[3]">
            <div class="card-header">
                <h3 class="card-title">Etapa intermedia</h3>
                <div v-if="estados[3] != 0" class="card-tools">
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="collapse"
                        title="Collapse"
                    >
                        <i class="fas fa-minus"></i>
                    </button>
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="maximize"
                        title="Collapse"
                    >
                        <i class="fa fa-maximize"></i>
                    </button>
                </div>
            </div>

            <div class="card-body p-0">
              <div class="col-md-9 mb-2 w-100">
                            <br />
                            <button
                                class="btn btn-primary"
                                @click="finalizarEtapa(4)"
                            >
                                <i class="fa-solid fa-eye"></i> Siguiente Etapa
                            </button>
                        </div>
                <h5>Bitacora</h5>
                <div v-if="estados[4] == 1">
                    <label>Agregar nota</label>
                    <textarea
                        name="Text1"
                        v-model="nota.texto"
                        class="form-control"
                        cols="70"
                        rows="5"
                    ></textarea>
                    <button class="btn btn-primary" @click="registrarNota(4)">
                        <i class="fa-solid fa-eye"></i> Agregar
                    </button>
                </div>

                <EasyDataTable
                    buttons-pagination
                    :headers="headers"
                    :items="itemsEtapaIntermedia"
                    :theme-color="themeColor"
                    :search-value="searchValue"
                >
                    <template #item-operation="item">
                        <div class="operation-wrapper">
                            <button
                                class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#modalAgregarUsuario"
                                @click="abrirModalRegistro"
                            >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button
                                class="btn btn-primary"
                                @click="eliminar(item)"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </template>
                </EasyDataTable>
            </div>
        </div>

        <!-- %%%%%%%Juicio Oral%%%%%%%-->

        <div :class="claseEstados[4]">
            <div class="card-header">
                <h3 class="card-title">Juicio Oral</h3>
                <div v-if="estados[4] != 0" class="card-tools">
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="collapse"
                        title="Collapse"
                    >
                        <i class="fas fa-minus"></i>
                    </button>
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="maximize"
                        title="Collapse"
                    >
                        <i class="fa fa-maximize"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <h5>Bitacora</h5>
                <div v-if="estados[5] == 1">
                    <label>Agregar nota</label>
                    <textarea
                        name="Text1"
                        v-model="nota.texto"
                        class="form-control"
                        cols="70"
                        rows="5"
                    ></textarea>
                    <button class="btn btn-primary" @click="registrarNota(5)">
                        <i class="fa-solid fa-eye"></i> Agregar
                    </button>
                </div>

                <EasyDataTable
                    buttons-pagination
                    :headers="headers"
                    :items="itemsjuicioOral"
                    :theme-color="themeColor"
                    :search-field="searchField"
                    :search-value="searchValue"
                >
                    <template #item-operation="item">
                        <div class="operation-wrapper">
                            <button
                                class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#modalAgregarUsuario"
                                @click="abrirModalRegistro"
                            >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <button
                                class="btn btn-primary"
                                @click="eliminar(item)"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </template>
                </EasyDataTable>
            </div>
        </div>

        <div
            class="modal fade"
            id="modalAgregarUsuario"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form
                        @submit.prevent="registrarUsuario"
                        @keydown="form.onKeydown($event)"
                    >
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAgregarUsuario">
                                Agregar usuario
                            </h5>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="_token" :value="csrf" />

                            <div class="form-group">
                                <label for="Nombre del usuario">Nombre</label>
                                <input
                                    v-model="form.name"
                                    type="text"
                                    class="form-control"
                                    id="nombre"
                                    aria-describedby="emailHelp"
                                    placeholder="Juan Pérez"
                                />

                                <div
                                    style="color: red"
                                    v-if="form.errors.has('name')"
                                    v-html="form.errors.get('name')"
                                />
                            </div>
                            <div class="form-group">
                                <label for="Correo del usuario">Correo</label>
                                <input
                                    v-model="form.email"
                                    type="text"
                                    class="form-control"
                                    id="correo"
                                    placeholder="algo@correo.com"
                                />

                                <div
                                    style="color: red"
                                    v-if="form.errors.has('email')"
                                    v-html="form.errors.get('email')"
                                />
                            </div>
                            <div class="form-group">
                                <label for="Contraseña del usuario"
                                    >Contraseña</label
                                >
                                <input
                                    v-model="form.password"
                                    type="password"
                                    class="form-control"
                                    id="contrasena"
                                    placeholder="Ingrese contraseña"
                                />

                                <div
                                    style="color: red"
                                    v-if="form.errors.has('password')"
                                    v-html="form.errors.get('password')"
                                />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                            >
                                <i class="fas fa-times"></i> Cancelar
                            </button>
                            <button
                                type="submit"
                                :disabled="form.busy"
                                class="btn btn-primary"
                            >
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
import type { Header, Item } from "vue3-easy-data-table";
import Form from "vform";

export default {
    data() {
        return {
            idimputado: this.$route.params.inputado,
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            searchField: ref("name"),
            searchValue: ref(""),
            themeColor: "#AB0033",
            headers: [
                { text: "Fecha", value: "fecha" },
                { text: "Nota", value: "nota" },
                { text: "Opciones", value: "updated_at" },
            ],
            itemsPreeliminar: [],
            itemsAudienciaInicial: [],
            itemsVinculacionAProceso: [],
            itemsEtapaIntermedia: [],
            itemsjuicioOral: [],
            form: new Form({
                id: "",
                name: "",
                email: "",
                password: "",
                remember_token: "",
                email_verified_at: "",
                created_at: "",
                updated_at: "",
            }),
            nota: new Form({
                texto: "",
                idimputado: 1,
                idEtapa: 1,
            }),
            datosEtapa: new Form({
                idimputado: 1,
                idEtapa: 1,
            }),
            estados: [],
            claseEstados: ["", "", "", "", ""],
        };
    },
    mounted() {
        this.getList();
        this.getEstadoEtapas();
    },
    methods: {
        abrirModalRegistro() {
            console.log("Se ha abierto el modal");
            this.form.reset();
            this.form.clear();
        },
        getList() {
            this.axios
                .get("/bitacora/notas/" + this.idimputado)
                .then((response) => {
                    this.itemsPreeliminar = response.data[0];
                    this.itemsAudienciaInicial = response.data[1];
                    this.itemsVinculacionAProceso = response.data[2];
                    this.itemsEtapaIntermedia = response.data[3];
                    this.itemsjuicioOral = response.data[4];
                });
        },
        getEstadoEtapas() {
            this.axios
                .get("/etapa/imputado/" + this.idimputado)
                .then((response) => {
                    this.estados = response.data;
                    for (let i = 0; i < this.estados.length; i++) {
                        if (this.estados[i] == 0)
                            this.claseEstados[i] =
                                "card collapsed-card card-secondary";
                        if (this.estados[i] == 1)
                            this.claseEstados[i] = "card card-primary";
                        if (this.estados[i] == 2)
                            this.claseEstados[i] =
                                "card collapsed-card card-success";
                    }
                });
        },
        async registrarNota(idEtapa) {
            this.nota.idimputado = Number(this.idimputado);
            this.nota.idEtapa = Number(idEtapa);
            await this.axios
                .post("/bitacora", this.nota)
                .then((response) => {
                    this.getList();
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        async finalizarEtapa(idEtapa) {
            this.datosEtapa.idimputado = Number(this.idimputado);
            this.datosEtapa.idEtapa = idEtapa;
            await this.datosEtapa.post('/etapa/finalizar').then((response) => {
                this.getEstadoEtapas();
          }).catch(error => {
              console.log(error);
          })
        
      }
           
    },
};
</script>
