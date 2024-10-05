import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5173, // Убедитесь, что это порт, на котором работает Vite
        hmr: {
            host: 'localhost',
            port: 5173, // Убедитесь, что это соответствует порту Vite
        },
    },
    css: {
        devSourcemap: true,
    },
    plugins: [
        laravel({
            input: 'resources/js/app.js',
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
});
