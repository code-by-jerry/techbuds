import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/mobile-optimizations.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    build: {
        // Production optimizations
        // Using esbuild (default, faster than terser) with console removal
        minify: 'esbuild',
        cssMinify: true,
        cssCodeSplit: true,
        // Remove console.log in production
        esbuild: {
            drop: ['console', 'debugger'],
        },
        rollupOptions: {
            output: {
                // Optimize chunk file names
                chunkFileNames: 'js/[name]-[hash].js',
                entryFileNames: 'js/[name]-[hash].js',
                assetFileNames: (assetInfo) => {
                    const info = assetInfo.name.split('.');
                    const ext = info[info.length - 1];
                    if (/png|jpe?g|svg|gif|tiff|bmp|ico/i.test(ext)) {
                        return `images/[name]-[hash][extname]`;
                    }
                    if (/woff2?|eot|ttf|otf/i.test(ext)) {
                        return `fonts/[name]-[hash][extname]`;
                    }
                    return `assets/[name]-[hash][extname]`;
                },
            },
        },
        // Chunk size warnings
        chunkSizeWarningLimit: 1000,
        // Source maps for production (optional - set to false for smaller builds)
        sourcemap: false,
    },
});
