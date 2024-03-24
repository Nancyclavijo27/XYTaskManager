<template>
  <div>
    <h1>Login</h1>
    <form>
      <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script>
export default {
  name: 'Login',
  data() {
    return {
      email: '',
      password: ''
    };
  },
  methods: {
    login() {
      // Aquí puedes agregar la lógica para iniciar sesión
    }
  }
};
</script>

<style scoped>
/* Estilos específicos del componente Login.vue */
</style>
