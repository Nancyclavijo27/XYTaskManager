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
import axios from '../util/axios'; // Importa la instancia de Axios desde el archivo axios.js

export default {
  data() {
    return {
      tasks: [], // Variable para almacenar las tareas obtenidas de la API
      userRole: '' // Debes pasar el rol de usuario desde el componente padre
    };
  },
  mounted() {
    // Método que se ejecuta cuando el componente se monta en el DOM
    axios.get('/tasks') // Realiza una solicitud GET a la ruta '/tasks' de la API
      .then(response => { // Maneja la respuesta exitosa de la solicitud
        this.tasks = response.data; // Asigna los datos de las tareas obtenidas a la variable 'tasks'
      })
      .catch(error => { // Maneja cualquier error que ocurra durante la solicitud
        console.error('Error al obtener las tareas:', error); // Imprime el error en la consola
      });
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
