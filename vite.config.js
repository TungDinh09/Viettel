import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    base:"/public/",
    plugins: [
        laravel(['resources/js/app.jsx']),
        { enforce: 'pre' },
        react({ include: /\.(mdx|js|jsx|ts|tsx)$/ }),
    ],
});
