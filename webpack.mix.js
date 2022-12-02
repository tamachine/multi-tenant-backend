const mix = require("laravel-mix");

require("laravel-mix-tailwind");

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

mix
    .js("resources/js/app.js", "public/js/app.js")
    .js("resources/js/admin.js", "public/js/admin.js")
    .scripts('resources/js/app/*.js', 'public/js/app/scripts.js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ])
    .postCss('resources/css/easepick.css', 'public/css') //it is needed here to avoid overriding css classes when using easepick
    .sass('resources/sass/admin.scss', 'public/css')
    .tailwind("./tailwind.config.js")
    .copy("resources/fonts", "public/fonts")
    .sourceMaps();

if (mix.inProduction()) {
    mix.version();
}
