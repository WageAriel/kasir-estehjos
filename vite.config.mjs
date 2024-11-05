import { defineConfig} from 'vite';
import vue from '@vitejs/plugin-vue';
import { fileURLToPath } from 'node:url';
import path from 'path';

// Mendapatkan path setara dengan __dirname dalam ESM
// const __filename = fileURLToPath(import.meta.url);
// const __dirname = path.dirname(__filename);

export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url)) // Menyelesaikan path untuk folder 'src'
    }
  }
});
