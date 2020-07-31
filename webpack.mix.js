let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false
    })
    .browserSync(({
        host: '192.168.10.10',
        proxy: 'simgoodies.test',
        open: false,
        files: [
            'app/**/*.php',
            'resources/views/**/*.php',
            'public/js/**/*.js',
            'public/css/**/*.css'
        ],
        watchOptions: {
            usePolling: true,
            interval: 500
        }
    }));
