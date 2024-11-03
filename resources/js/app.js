import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { createRouter, createWebHistory } from 'vue-router'; // Import vue-router
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import routes from '@/index'; // Import file routes.js untuk konfigurasi rute

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

// Konfigurasi router
const router = createRouter({
  history: createWebHistory(),
  routes,
});

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        const vueApp = createApp({ render: () => h(App, props) });

        vueApp.use(plugin)
              .use(ZiggyVue)
              .use(router) // Gunakan router di sini
              .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
