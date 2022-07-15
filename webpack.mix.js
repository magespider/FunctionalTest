const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

/* Admin Assets */

mix.js('resources/js/admin/app.js', 'public/js/admin').postCss('resources/css/admin/app.css', 'public/css/admin', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);