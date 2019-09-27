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

mix.scripts([
	'resources/js/jquery.min.js',
    'resources/js/jquery.maskedinput-1.3.min.js',
    'resources/js/index.js',
	], 'public/js/app.js');
mix.styles([
    	'resources/css/reset.css',
    'resources/css/libs/animate.css',
        'resources/css/common.css',
    	], 'public/css/all.css');

mix.copyDirectory('resources/css/fonts', 'public/css/fonts');

mix.copyDirectory('resources/images', 'public/images');

mix.copyDirectory('resources/dist', 'public/dist');


