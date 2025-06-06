import axios from 'axios';


// src/utils/helpers.js
export function saludar(nombre) {
    return `Hola, ${nombre}!`;
}

export function formatearFecha(fecha) {
    return new Date(fecha).toLocaleDateString();
}


export async function registrarLog(data) {
    try {
        await axios.post('/logs', data);
    } catch (error) {
        console.error('Error al guardar el log:', error);
        throw error;
    }
}

export async function obtenerCambios( formOriginal, formCambiado ){
    const currentData = formCambiado
    const changed = []

    for (const key in currentData) {
        if (currentData[key] !== formOriginal[key]) {
            changed.push({
                [key] : currentData[key]
            });
        }
    }

    return changed
}

// Puedes seguir agregando más funciones...