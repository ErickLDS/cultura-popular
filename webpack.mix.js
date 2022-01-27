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

// mix.js('resources/js/app.js', 'public/js')
//     .js('resources/js/admin-app.js', 'public/js')

//     .js('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/bootstrap')
//     .sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/bootstrap')

//     .js('node_modules/jquery/dist/jquery.slim.min.js', 'public/jquery')

//     .js('node_modules/@fortawesome/fontawesome-free/js/fontawesome.js', 'public/fontawesome')
//     .postCss('node_modules/@fortawesome/fontawesome-free/css/fontawesome.css', 'public/fontawesome')
//     .js('node_modules/@fortawesome/fontawesome-free/js/solid.js', 'public/fontawesome')
//     .postCss('node_modules/@fortawesome/fontawesome-free/css/solid.css', 'public/fontawesome')
    
//     .styles(['resources/css/admin-app.css'],
//     'public/css/admin-app.css')

//     .styles(['resources/css/config.css',
//     'resources/css/mapa.css',
//     'resources/css/content.css',
//     'resources/css/card.css',
//     'resources/css/responsive.css'],
//     'public/css/app.css').vue();

mix.js('resources/js/admin-app.js', 'public/js')
    .styles(['resources/css/admin-app.css'],
    'public/css/admin-app.css').vue();