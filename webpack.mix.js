const { mix } = require('laravel-mix');

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
    .scripts([
        'resources/assets/js/source/App.js',
        'resources/assets/js/source/AppCard.js',
        'resources/assets/js/source/AppNavSearch.js',
        'resources/assets/js/source/AppNavigation.js',
        'resources/assets/js/source/AppOffcanvas.js',
        'resources/assets/js/source/AppVendor.js',
        'resources/assets/js/demo/Demo.js'
    ], 'public/js/core.js')
    .copy('resources/assets/js/demo', 'js/extra')
    .less('resources/assets/less/app.less', 'public/css');