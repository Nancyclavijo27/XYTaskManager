import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/sass/app.scss',
        'resources/js/app.js',
      ],
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
  ],
  resolve: {
    alias: {
        vue: 'vue/dist/vue.esm-bundler.js',
        '@components': '/resources/js/components', // Ruta real de la carpeta de componentes
        '@views': '/resources/js/views', // Ruta real de la carpeta de vistas
        '@router': '/resources/js/router', // Ruta real del directorio del router
    },
    extensions: ['.js', '.vue'], // Extensiones de archivo que Vite intentará resolver automáticamente
  },
  // Configuración para manejar archivos públicos
  publicDir: 'public', // Especifica la carpeta de archivos públicos
  // Configuración del servidor de desarrollo
  server: {
    port: 3000, // Puerto del servidor de desarrollo
    proxy: {
      '/api': {
        target: 'http://localhost:8000', // Proxy para redirigir solicitudes a tu backend
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/api/, ''),
      },
    },
  },
  // Configuración de construcción para producción
  build: {
    minify: true, // Minificar el código en producción
    sourcemap: true, // Generar archivos de mapa de origen para facilitar la depuración
  },
});
