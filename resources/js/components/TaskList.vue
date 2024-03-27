<template>
  <div class="container">
    <h1 class="text-3xl font-bold mb-4">Lista de Tareas</h1>

    <div class="flex flex-col space-y-4">
      <div v-for="task in tasks" :key="task.id" class="bg-white shadow-md rounded p-4">
        <h3 class="text-xl font-bold">{{ task.title }}</h3>
        <p class="text-gray-700">{{ task.description }}</p>
        <p class="text-gray-700"><strong>Estado:</strong> {{ task.status }}</p>
        <p class="text-gray-700"><strong>Asignado a:</strong> {{ task.assignedUser.name }}</p>

        <!-- Solo se muestra el botón Eliminar Tarea si el usuario es un super administrador -->
        <template v-if="userRole === 'super_admin'">
          <form @submit.prevent="deleteTask(task.id)">
            <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded mt-2">Eliminar Tarea</button>
          </form>
        </template>

        <a :href="'/tasks/comments/show/' + task.id" class="bg-blue-500 text-white font-bold py-2 px-4 rounded mt-2 inline-block">Ver Comentarios</a>

        <!-- Agrega aquí la lógica para mostrar los comentarios y archivos adjuntos -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tasks: [], // Debes pasar las tareas desde el componente padre
      userRole: '' // Debes pasar el rol de usuario desde el componente padre
    };
  },
  methods: {
    deleteTask(taskId) {
      // Agrega aquí la lógica para eliminar la tarea
    }
  }
}
</script>

<style scoped>
/* Estilos específicos para este componente */
</style>
