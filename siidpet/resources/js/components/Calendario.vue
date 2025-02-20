<template>
    

    <div class="content-header mt-3">
        <div class="d-flex justify-content-between align-items-center ">
            <h1 class="h4">Calendario</h1>
        </div>
    </div>


    <!-- /.content-header -->
    <div class="container mt-2">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 0.7rem">
                    <div class="card-body p-0">
                        <div id="calendar"></div>
                    </div>
                </div>
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
