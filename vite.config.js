import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/signin.css',
                'resources/css/signup.css',
                'resources/js/app.js',
                'vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js'
            ],
            refresh: true,
        }),
    ],
});
