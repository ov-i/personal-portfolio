const mix = require('laravel-mix');
const Dotenv = require('dotenv-webpack')

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


mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ])
    .sourceMaps()

// Admin section
mix.js('resources/js/admin.js', 'public/js')
    .vue()
    .postCss('resources/css/admin.css', 'public/css', [
        require('tailwindcss'),
    ])
    .sourceMaps()

// Auth section
mix.js('resources/js/auth.js', 'public/js')
    .vue()
    .postCss('resources/css/auth.css', 'public/css', [
        require('tailwindcss'),
    ])
    .sourceMaps()
