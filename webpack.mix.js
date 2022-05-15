const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .vue(3)
    .version()
    .postCss("resources/css/app.css", "public/css", [
        //
    ]);

// Mix v6
const path = require("path");

mix.alias({
    ziggy: path.resolve("vendor/tightenco/ziggy/dist"), // or 'vendor/tightenco/ziggy/dist/vue' if you're using the Vue plugin
});
