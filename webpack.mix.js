const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/map.js', 'public/js')
    .js('resources/js/edit.js', 'public/js')
    .js('resources/js/front.js', 'public/js')
    .js('resources/js/create.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/create.scss', 'public/css')
    .sass('resources/sass/edit.scss', 'public/css')
    .sass('resources/sass/map.scss', 'public/css')
    .sass('resources/sass/front.scss', 'public/css');