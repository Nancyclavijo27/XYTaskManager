<template>
  <div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-4">Generar Reporte de Tareas</h2>

    <form @submit.prevent="generateReport" class="bg-white shadow-md rounded p-6">
      <div class="mb-4">
        <label for="startDate" class="block text-sm font-bold mb-2">Fecha de inicio</label>
        <input type="date" v-model="startDate" id="startDate" name="startDate" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
      </div>

      <div class="mb-4">
        <label for="endDate" class="block text-sm font-bold mb-2">Fecha de fin</label>
        <input type="date" v-model="endDate" id="endDate" name="endDate" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
      </div>

      <div class="flex justify-end">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Generar Reporte</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      startDate: '',
      endDate: ''
    };
  },
  methods: {
    generateReport() {
      // Aquí puedes enviar las fechas seleccionadas al servidor para generar el reporte de tareas
      const reportData = {
        startDate: this.startDate,
        endDate: this.endDate
      };
      
      // Por ejemplo, podrías enviar las fechas a través de una petición Axios al servidor
      // Y luego podrías mostrar el reporte generado en una nueva página o en un componente dedicado
    }
  }
}
</script>

<style scoped>
/* Estilos específicos para este componente */
</style>
