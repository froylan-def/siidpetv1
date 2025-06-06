<template>
  <q-page class="q-pa-md bg-grey-2">
    <!-- Header -->
    <q-banner class="bg-primary text-white q-pa-md flex justify-between">
      <div class="text-h6">Expediente 001 / 2025</div>
      <div class="text-subtitle2">UGI: 4</div>
    </q-banner>

    <!-- Contenido Principal -->
    <div class="row q-mt-md">
      <!-- Lado izquierdo - Información General -->
      <div class="col-md-3 col-xs-12">
        <q-card class="q-mb-md">
          <q-card-section>
            <div class="text-subtitle1"><q-icon name="person" /> Imputado</div>
            <p>Jose Alejandro Segura Hernandez</p>
          </q-card-section>
        </q-card>
        <q-card class="q-mb-md">
          <q-card-section>
            <div class="text-subtitle1"><q-icon name="person" /> Víctima</div>
            <p>Javier Hernandez Balcazar</p>
          </q-card-section>
        </q-card>
        <q-card>
          <q-card-section>
            <div class="text-subtitle1"><q-icon name="gavel" /> Delitos</div>
            <q-chip>Armas prohibidas</q-chip>
            <q-chip>Oposición a obra pública</q-chip>
            <q-chip>Incesto</q-chip>
            <q-chip>Violaciones a leyes sobre inhumaciones</q-chip>
          </q-card-section>
        </q-card>
      </div>

      <!-- Contenido Derecho - Formulario -->
      <div class="col-md-9 col-xs-12">
        <q-card>
          <q-tabs v-model="tab" class="text-primary">
            <q-tab name="entrevista" label="Entrevista" />
            <q-tab name="imputado" label="Imputado" />
            <q-tab name="delito" label="Delito" />
            <q-tab name="victima" label="Víctima" />
            <q-tab name="flagrancia" label="Flagrancia" />
          </q-tabs>

          <q-tab-panels v-model="tab" animated>
            <q-tab-panel name="entrevista">
              <div class="text-h6">Entrevista</div>
              <q-input v-model="defensor" label="Defensor" class="q-mt-md" />
              <q-input v-model="fecha" label="Fecha" mask="date" class="q-mt-md">
                <template v-slot:append>
                  <q-icon name="event" class="cursor-pointer">
                    <q-popup-proxy>
                      <q-date v-model="fecha" />
                    </q-popup-proxy>
                  </q-icon>
                </template>
              </q-input>
              <q-input v-model="observaciones" label="Observaciones" type="textarea" class="q-mt-md" />
              <q-btn label="Actualizar" color="primary" class="q-mt-md" icon="save" />
            </q-tab-panel>
          </q-tab-panels>
        </q-card>
      </div>
    </div>
  </q-page>
</template>

<script>
export default {
  data() {
    return {
      tab: "entrevista",
      defensor: "Fernando Lopez Fajardo",
      fecha: new Date().toISOString().slice(0, 10),
      observaciones: "TEST",
    };
  },
};
</script>

<style scoped>
.bg-grey-2 {
  background-color: #f5f5f5;
}
</style>
