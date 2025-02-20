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
                <!--
                <div class="col-md-1">
                    <div class="sticky-top mb-3">
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Crear evento</h3>
                            </div>
                            <div class="card-body">
                                
                                
                                <div class="input-group">
                                    <input id="new-event" type="text" class="form-control"
                                        placeholder="Titulo">

                                    <div class="input-group-append">
                                        <button id="add-new-event" type="button"
                                            class="btn btn-primary">Agregar</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                -->
                <!-- /.col -->
                <div class="col-md-12">
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
import esLocale from '@fullcalendar/core/locales/es';
import interactionPlugin from '@fullcalendar/interaction'; // for selectable
import dayGridPlugin from '@fullcalendar/daygrid'; // for dayGridMonth view


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
                plugins: [ interactionPlugin ],
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                firstDay: 1,
                themeSystem: 'bootstrap',
                events: [
                    {
                        title: 'Audiencia 001 / 2025',
                        start: new Date(y, m, d - 2),
                        end: new Date(y, m, d - 2),
                        backgroundColor: 'var(--primary-color)', //yellow
                        borderColor: 'var(--primary-color)' //yellow
                    },
                    {
                        title: 'Audiencia 005 / 2022',
                        start: new Date(y, m, d - 5),
                        end: new Date(y, m, d - 4),
                        backgroundColor: 'var(--success-color)', //yellow
                        borderColor: 'var(--success-color)' //yellow
                    },
                    {
                        title: 'Audiencia 121 / 2021',
                        start: new Date(y, m, d - 5),
                        end: new Date(y, m, d - 3),
                        backgroundColor: 'var(--secondary-color)', //yellow
                        borderColor: 'var(--secondary-color)' //yellow
                    }

                ],
                /*
                dateClick: (info) => {
                    alert(`Has hecho clic en: ${info.dateStr}`);
                },
                */
                select: (info) => {
                    alert(`Seleccionaste desde: ${info.startStr} hasta ${info.endStr}`);
                },
                editable: true,
                droppable: true,
                selectable: true,
                locale: esLocale
            });
            calendar.render();

        })
    },
    methods: {
    }
}
</script>
