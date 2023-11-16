<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Calendario </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active"> Calendario </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-md-3">
                    <div class="sticky-top mb-3">
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Crear evento</h3>
                            </div>
                            <div class="card-body">
                                
                                <!-- /btn-group -->
                                <div class="input-group">
                                    <input id="new-event" type="text" class="form-control"
                                        placeholder="Titulo">

                                    <div class="input-group-append">
                                        <button id="add-new-event" type="button"
                                            class="btn btn-primary">Agregar</button>
                                    </div>
                                    <!-- /btn-group -->
                                </div>
                                <!-- /input-group -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>


    </div>
</template>

<script lang="ts">




import { ref } from "vue";
import type { Header, Item } from "vue3-easy-data-table";
import Form from 'vform'
import Swal from 'sweetalert2'

export default {

    data() {
        return {
            date: new Date()
        }
    },
    mounted() {
        $(function () {
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var calendarEl = document.getElementById('calendar');
            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                events: [
                    {
                        title: 'Un evento largoooo',
                        start: new Date(y, m, d - 5),
                        end: new Date(y, m, d - 2),
                        backgroundColor: '#f39c12', //yellow
                        borderColor: 'black' //yellow
                    }
                ],
                editable: true,
                droppable: true,
                locale: 'es'
            });
            calendar.render();

        })
    },
    methods: {
    }
}
</script>
