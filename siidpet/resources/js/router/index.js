import { createRouter, createWebHistory} from 'vue-router';

import Home from '../components/Home.vue'
import Usuarios from '../components/Usuarios.vue'

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },{
        path: '/usuarios',
        name: 'usuarios',
        component: Usuarios
    }
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});

export default router;