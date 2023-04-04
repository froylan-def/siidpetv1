import { createRouter, createWebHistory} from 'vue-router'

import Home from '../components/Home.vue'
import Usuarios from '../components/Usuarios.vue'
import nsjpao from '../components/NSJPAO.vue'
import NUC from '../components/ExpedienteImputado.vue'
import PaginaNoEncontrada from  '../components/PaginaNoEncontrada.vue'
import verNuc from  '../components/verNuc.vue'
import ExpedienteImputado from  '../components/ExpedienteImputado.vue'
import AccesoDenegado from '../components/PaginaDenegada.vue'
import Permisos from '../components/Permisos.vue';
import Peticionarios from '../components/Peticionarios.vue';
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/usuarios',
        name: 'usuarios',
        component: Usuarios
    },
    {
        path: '/denegado',
        name: 'denegado',
        component: AccesoDenegado
    },
    { 
        path: '/nsjpao',
        name: 'nsjpao',
        component: nsjpao
    },
    { 
        path: '/nuc',
        name: 'nuc',
        component: NUC
    },
    { 
        path: '/nuc/ver/:NUC',
        name: 'verNuc',
        component: verNuc
    },
    { 
        path: '/nuc/ExpedienteImputado/:inputado',
        name: 'ExpedienteImputado',
        component: ExpedienteImputado
    },
    { 
        path: '/permisos',
        name: 'Permisos',
        component: Permisos
    },
    { 
        path: '/peticionarios',
        name: 'Peticionarios',
        component: Peticionarios
    },
    {
        path: "/:catchAll(.*)",
        name: "NotFound",
        component: PaginaNoEncontrada,
    }
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});

 /* router.beforeEach((to, from, next) => {
    //check page is protected or not

    const baseUrl = "/" + to.fullPath.split('/')[1]
    let permitirAcceso = false;
    for (let index = 0; index < window.permisosSession.length; index++) {
        const permiso = window.permisosSession[index];
        if( baseUrl === permiso.ruta ){
            permitirAcceso = true;
        }
    }

    if( permitirAcceso || to.fullPath === '/denegado' || to.fullPath === '/permisos' ){
        next();
    }else{
        next('/denegado');
    }

  });
*/
export default router;