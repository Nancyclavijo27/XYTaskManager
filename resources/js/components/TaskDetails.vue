<template>
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold my-6">Detalles de Tarea</h1>

    <div class="bg-white shadow-md rounded p-6">
      <h2 class="text-xl font-bold">{{ task.title }}</h2>
      <p class="text-gray-700">{{ task.description }}</p>
      <p class="text-gray-700"><strong>Estado:</strong> {{ task.status }}</p>
      <p class="text-gray-700"><strong>Asignado a:</strong> {{ task.assignedUser.name }}</p>

      <div class="mt-4">
        <h3 class="text-lg font-bold">Comentarios</h3>
        <ul class="list-disc list-inside mt-2">
          <li v-for="comment in task.comments" :key="comment.id">{{ comment.text }}</li>
        </ul>
      </div>

      <div class="mt-4">
        <h3 class="text-lg font-bold">Archivos Adjuntos</h3>
        <ul class="list-disc list-inside mt-2">
          <li v-for="file in task.attachments" :key="file.id">{{ file.name }}</li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    task: {
      type: Object,
      required: true
    }
  }
}
</script>

<style scoped>
/* Estilos específicos para este componente */
</style>
