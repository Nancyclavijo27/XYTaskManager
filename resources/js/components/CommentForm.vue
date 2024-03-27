<template>
  <div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-4">Agregar Comentario</h2>

    <form @submit.prevent="submitComment" class="bg-white shadow-md rounded p-6">
      <div class="mb-4">
        <label for="comment" class="block text-sm font-bold mb-2">Comentario</label>
        <textarea v-model="comment" id="comment" name="comment" rows="3" placeholder="Escribe tu comentario aquí..." class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required></textarea>
      </div>

      <div class="flex justify-end">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Agregar Comentario</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      comment: ''
    };
  },
  methods: {
    submitComment() {
      // Aquí puedes enviar el comentario al servidor
      // Puedes acceder al comentario a través de this.comment
      // Por ejemplo, podrías enviarlo a través de una petición Axios
      // y luego reiniciar el formulario
      this.comment = '';
    }
  }
}
</script>

<style scoped>
/* Estilos específicos para este componente */
</style>
