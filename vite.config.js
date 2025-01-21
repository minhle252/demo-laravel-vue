import vue from '@vitejs/plugin-vue';
import path from 'path';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [vue()],
    server: {
        host: 'localhost',
    },
    build: {
      manifest: true, // Đảm bảo manifest được tạo ra
      outDir: 'public/build', // Đảm bảo thư mục build đúng
      rollupOptions: {
        input: [
          path.resolve(__dirname, 'resources/js/app.js'),  // JavaScript file
          path.resolve(__dirname, 'resources/css/app.css') // CSS file
        ], // Thêm app.css vào input
        output: {
            entryFileNames: '[name]-[hash].js',
            chunkFileNames: '[name]-[hash].js',
            assetFileNames: '[name]-[hash].[ext]',
          },
      },
    },
    publicDir: false,
    resolve: {
      alias: {
        '@': path.resolve(__dirname, 'resources/js'),
      },
    },
  })
