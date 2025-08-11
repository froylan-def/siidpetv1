<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0"> Asignación medidas de protección </h5>
                </div>
            </div>
            <small class="text-muted"> Porfavor llene los campos. Para ingresar una fecha da clic en el icono del
                calendario. </small>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row mb-2">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary w-100 " data-toggle="modal" data-target="#exampleModal"
                            @click="agregarMedida">
                            <i class="fa-regular fa-square-check"></i>
                            Agregar medida
                        </button>
                    </div>
                </div>
                <EasyDataTable :headers="datos" :items="items" rowsPerPageMessage="Filas por página:"
                    emptyMessage="No hay datos disponibles" alternating table-class-name="customize-table"
                    theme-color="var(--primary-color)">
                    <template #loading>
                        <img src="https://i.pinimg.com/originals/94/fd/2b/94fd2bf50097ade743220761f41693d5.gif"
                            style="width: 100px; height: 80px;" />
                    </template>
                    <template #item-operation="item">
                        <div class="operation-wrapper">
                            <button class="btn btn-warning btn-sm mt-2 mb-2 mr-1" @click="editarMedida(item)">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                        </div>
                        <div class="operation-wrapper">
                            <button class="btn btn-danger btn-sm mt-2 mb-2 mr-1" @click="eliminarMedida(item)">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </template>
                    <template #item-fecha_inicio="item">
                        {{ formatearFecha(item.fecha_inicio) }}
                    </template>
                    <template #item-fecha_vencimiento="item">
                        {{ formatearFecha(item.fecha_inicio) }}
                    </template>
                </EasyDataTable>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="!actualizarUsuarioCheck" class="modal-title" id="exampleModalLabel">Agregar medida
                        </h5>
                        <h5 v-else class="modal-title" id="exampleModalLabel"> Editar medida</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="fecha_inicio">Fecha inicio</label>
                                <input type="date" v-model="form.fecha_inicio" class="form-control" id="fecha_inicio"
                                    name="fecha_inicio">
                                <div style="color: red;" v-if="form.errors.has('fecha_inicio')"
                                    v-html="form.errors.get('fecha_inicio')" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fecha_vencimiento">Fecha vencimiento</label>
                                <input type="date" v-model="form.fecha_vencimiento" class="form-control"
                                    id="fecha_vencimiento" name="fecha_vencimiento">
                                <div style="color: red;" v-if="form.errors.has('fecha_vencimiento')"
                                    v-html="form.errors.get('fecha_vencimiento')" />
                            </div>
                            <div class="form-group col-md-12">
                                <label for="id_medida_proteccion">Medida protección </label>
                                <v-select v-model="this.form.id_medida_proteccion" :reduce="(option) => option.id"
                                    :options="medidasOpciones">
                                </v-select>
                                <div style="color: red;" v-if="form.errors.has('id_medida_proteccion')"
                                    v-html="form.errors.get('id_medida_proteccion')" />
                            </div>
                            <div class="form-group col-md-12">
                                <label for="observaciones">Observaciones: </label>
                                <textarea v-model="form.observaciones" class="form-control" id="observaciones"
                                    name="observaciones" rows="3" aria-describedby="determinacion_mp"
                                    placeholder=""></textarea>

                                <div style="color: red;" v-if="form.errors.has('observaciones')"
                                    v-html="form.errors.get('observaciones')" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button v-if="!actualizarUsuarioCheck" type="button" class="btn btn-primary float-right mb-1"
                            @click="guardarAsignacionMedidas"> <i class="fa-solid fa-floppy-disk"></i> Agregar </button>
                        <button v-else type="button" class="btn btn-primary float-right mb-1"
                            @click="editarAsignacionMedidas">
                            <i class="fa-solid fa-floppy-disk"></i> Editar </button>
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
import { registrarLog, obtenerCambios } from '../../../../utils/helpers';

export default {
    data() {
        return {
            actualizarUsuarioCheck: ref(false),
            datos: [
                { text: "Fecha inicio", value: "fecha_inicio", name: "fechaincio" },
                { text: "Fecha de vencimiento", value: "fecha_vencimiento", name: "fechavencimiento" },
                { text: "Medida de Protección", value: "medida.nombre" },
                { text: "observaciones", value: "observaciones" },
                { text: "Opciones", value: "operation" }
            ],
            items: ref([]),
            form: new Form({
                id: '',
                fecha_inicio: '',
                fecha_vencimiento: '',
                id_medida_proteccion: '',
                activo: 1,
                observaciones: '',
                id_expediente: '',
            }),
            esNuevo: ref(false),
            loading: ref(true),
            medidasOpciones: ref([]),
            originalData: ref({}),
        }
    },
    async mounted() {
        this.form.id_expediente = await this.$route.params.id;
        await this.obtenerAsignacionMedidas();
        await this.obtenerMedidasProteccion();

    },
    methods: {
        formatearFecha(fechaStr) {
            const fecha = new Date(fechaStr);
            const dia = String(fecha.getDate()).padStart(2, '0');
            const mes = String(fecha.getMonth() + 1).padStart(2, '0');
            const año = fecha.getFullYear();
            return `${dia}/${mes}/${año}`;
        },
        agregarMedida() {
            this.form.errors.clear();
            this.actualizarUsuarioCheck = false;
            this.form.id = '';
            this.form.fecha_inicio = '';
            this.form.fecha_vencimiento = '';
            this.form.id_medida_proteccion = '';
            this.form.observaciones = '';
            $('#exampleModal').modal('show');
        },
        editarMedida(datos) {
            $('#exampleModal').modal('show');
            this.actualizarUsuarioCheck = true;
            this.form.errors.clear();
            this.form.id = datos.id;
            this.form.fecha_inicio = datos.fecha_inicio;
            this.form.fecha_vencimiento = datos.fecha_vencimiento;
            this.form.id_medida_proteccion = datos.id_medida_proteccion;
            this.form.observaciones = datos.observaciones;
        },
        eliminarMedida(datosDeLaMedida) {
            Swal.fire({
                title: '¿Está seguro de eliminar esta medida del expediente?',
                showDenyButton: true,
                icon: 'question',
                confirmButtonText: 'Aceptar',
                denyButtonText: `Cancelar`,
                confirmButtonColor: 'LightSeaGreen',
                cancelButtonColor: 'Crimson',
            }).then((result) => {
                if (result.isConfirmed) {
                    const route = '/asignacionmedidas/' + datosDeLaMedida.id + '/';
                    this.axios.delete(route).then((response) => {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Medida eliminada con éxito',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.obtenerAsignacionMedidas();
                        const objetoAlmacenado = JSON.stringify(datosDeLaMedida);
                        const data = {
                            id_defensor: window.defensor,
                            accion: "Se quitó medida del expediente",
                            descripcion: objetoAlmacenado,
                            id_registro: id_expediente,
                            tipo_registro: 13
                        };
                        registrarLog(data);
                    }).catch(error => {
                        console.log(error);
                    });
                } else if (result.isDenied) {
                    Swal.fire('Cambios no realizados', '', 'info')
                }
            })
        },
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
            this.axios.get('/medidasporexpediente/' + this.$route.params.id).then((response) => {
                this.items = response.data;
            });
        },
        editarAsignacionMedidas() {
            this.form.errors.clear();
            let error = this.validarFormulario();
            if (error) {
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
                $('#exampleModal').modal('hide');
                this.guardarLog(2);
            })
        },
        async guardarAsignacionMedidas() {
            this.form.errors.clear();
            let error = this.validarFormulario();
            if (error) {
                return
            }
            this.form.id_expediente = await this.$route.params.id;
            await this.form.post('/asignacionmedidas').then((response) => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: response.data.mensaje,
                    showConfirmButton: false,
                    timer: 1500
                })
                this.loading = true;
                this.obtenerAsignacionMedidas();
                $('#exampleModal').modal('hide');
                this.guardarLog(1);
            })
        },
        validarFormulario() {
            let error = false;
            if(this.form.fecha_inicio > this.form.fecha_vencimiento) {
                this.form.errors.set('fecha_inicio', 'La fecha de inicio no puede ser mayor que la fecha de vencimiento');
                error = true;
            }
            if (this.form.fecha_inicio === null || this.form.fecha_inicio === "") {
                this.form.errors.set('fecha_inicio', 'Este campo es requerido');
                error = true;
            }
            if (this.form.fecha_vencimiento === null || this.form.fecha_vencimiento === "") {
                this.form.errors.set('fecha_vencimiento', 'Este campo es requerido');
                error = true;
            }
            if (this.form.id_medida_proteccion === null || this.form.id_medida_proteccion === "") {
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
            if (tieneIdMedida) {
                let nombreMedida = "";
                await this.axios.get('/medidaproteccion/' + this.form.id_medida_proteccion).then((response) => {
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
