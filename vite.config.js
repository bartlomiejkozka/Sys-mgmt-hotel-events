import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: true,        // pozwala nasłuchiwać na wszystkich interfejsach (dla Docker)
        port: 5173,        // musi się zgadzać z VITE_PORT z .env
        strictPort: true,  // jeśli port zajęty, nie szuka innego
        hmr: {
            host: 'localhost', // ← lub '127.0.0.1' dla lokalnego dev
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
