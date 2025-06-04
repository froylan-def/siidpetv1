<template>
  <div>
    <apexchart 
      type="bar" 
      height="400" 
      :options="chartOptions" 
      :series="series"
    />
  </div>
</template>

<script>
import VueApexCharts from "vue3-apexcharts";

export default {
  name: "LineChartExample",
  components: {
    apexchart: VueApexCharts,
  },
  data() {
    return {
      chartOptions: {
        chart: {
          id: "ventas-chart",
        },
        xaxis: {
          categories: [],
        },
        title: {
          text: "Expedientes por mes",
          align: "center",
        },
      },
      series: [
        {
          name: "Expedientes",
          data: [],
        },
      ],
      expedientesPorMes: null,
    };
  },
  methods: {
    conteoPorMes(){
      const conteoPorMes = this.items.reduce((acc, item) => {
        const mes = item.fecha.substring(0, 7); // Extrae "YYYY-MM"
        acc[mes] = (acc[mes] || 0) + 1; // Suma al contador
        return acc;
      }, {});

      const resultadoOrdenado = Object.entries(conteoPorMes)
      .map(([mes, cantidad]) => ({ mes, cantidad }))
      .sort((a, b) => b.mes.localeCompare(a.mes)); // Ordena de mayor a menor

      this.expedientesPorMes = resultadoOrdenado;
      
      const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
      this.expedientesPorMes.forEach((mes, index) => {
        const soloMes = mes.mes.split("-")[1];
        const soloAnio = mes.mes.split("-")[0];
        const leyenda = `${meses[soloMes-1]} ${soloAnio}`;
        this.series[0].data.push(mes.cantidad);
        this.chartOptions.xaxis.categories.push(leyenda);
      });
      


    },
    obtenerExpedientes() {
      this.axios.get("/expediente").then((response) => {
        this.items = response.data;
        this.conteoPorMes();
      }).catch(error => {
        console.error("Error al obtener expedientes:", error);
      });
    },
  },
  mounted() {
    this.obtenerExpedientes();
  },
};
</script>
