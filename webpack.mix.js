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

mix//.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/game/wanwan_world/app.js', 'public/js/game/wanwan_world')
    .js('resources/assets/js/twitterButton.js', 'public/js')
    .js('resources/assets/js/components/comment/comment.js', 'public/js')
    .sass('resources/assets/sass/index.scss', 'public/css')
    .sass('resources/assets/sass/mailform.scss', 'public/css')
    .sass('resources/assets/sass/gist.scss', 'public/css');


