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
        },
    },

    resolve: {
        alias: {
            '@components': '/path/to/resources/js/components', // Alias para la carpeta de componentes
            '@views': '/path/to/resources/js/views', // Alias para la carpeta de vistas
            // Agrega más alias según sea necesario para otros directorios o archivos
        },
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
