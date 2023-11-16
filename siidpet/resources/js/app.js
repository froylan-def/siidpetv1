/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

//const app = createApp({});

//import ExampleComponent from './components/ExampleComponent.vue';
//app.component('example-component', ExampleComponent);
//import 'carbon-components/css/carbon-components.css';
//import CarbonComponentsVue from '@carbon/vue';


/*import {
    provideFluentDesignSystem,
    fluentCombobox,
    fluentOption
} from "@fluentui/web-components";

provideFluentDesignSystem()
    .register(
        fluentCombobox(),
        fluentOption()
    ); */
    

import router from './router/index';
import AppComponent from './components/App.vue';

import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';


import axios from 'axios'
import VueAxios from 'vue-axios'


const app = createApp({
    components: {
        AppComponent
    }
});


import { setupCalendar, Calendar, DatePicker } from 'v-calendar';
import 'v-calendar/style.css';

// Use plugin defaults (optional)
app.use(setupCalendar, {})

// Use the components
app.component('VCalendar', Calendar)
app.component('VDatePicker', DatePicker)

app.component('EasyDataTable', Vue3EasyDataTable);
app.use(router)
app.use(VueAxios, axios)
app.mount('#app');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */
