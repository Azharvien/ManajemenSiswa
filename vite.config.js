import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    // 👇👇 BAGIAN KRITIS UNTUK HERD/VALET (.TEST) 👇👇
    server: {
        // Mengizinkan Vite untuk diakses dari host jaringan lokal, seringkali mengatasi masalah di Windows/Herd.
        host: true, 
        
        // Memastikan HMR (Live Reload) tahu bahwa client berada di domain .test
        hmr: {
            // Ganti 'manajemensiswa.test' dengan domain Herd Anda
            host: 'manajemensiswa.test',
        },
    },
});