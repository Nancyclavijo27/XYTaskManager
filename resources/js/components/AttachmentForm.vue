<template>
  <div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-4">Adjuntar Archivo</h2>

    <form @submit.prevent="submitAttachment" class="bg-white shadow-md rounded p-6">
      <div class="mb-4">
        <label for="file" class="block text-sm font-bold mb-2">Archivo</label>
        <input type="file" ref="fileInput" id="file" name="file" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
      </div>

      <div class="flex justify-end">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Adjuntar Archivo</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  methods: {
    submitAttachment() {
      // Aquí puedes obtener el archivo adjunto del input file
      const file = this.$refs.fileInput.files[0];
      
      if (!file) {
        // Si no se selecciona ningún archivo, puedes mostrar un mensaje de error
        console.error('No se ha seleccionado ningún archivo.');
        return;
      }
      
      // Aquí puedes enviar el archivo adjunto al servidor
      // Puedes acceder al archivo a través de la variable 'file'
      // Por ejemplo, podrías enviarlo a través de una petición Axios o FormData
      // Luego puedes reiniciar el formulario
      this.$refs.fileInput.value = ''; // Reiniciamos el input file
    }
  }
}
</script>

<style scoped>
/* Estilos específicos para este componente */
</style>
