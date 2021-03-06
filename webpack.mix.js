const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
require('mix-tailwindcss');



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
 //    .copy('node_modules/line-awesome/dist/line-awesome/fonts', 'public/fonts')
 //    .vue()
 //    .sass('resources/sass/app.scss', 'public/css')
 //    .options({
 //        processCssUrls: false,
 //        postCss: [ tailwindcss('./tailwind.config.js') ],
 //    });


   mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/alpine.js', 'public/js')
    .copy('node_modules/line-awesome/dist/line-awesome/fonts', 'public/fonts')
    .postCss('resources/css/app.css', 'public/css', [
       
    ]) 
    .tailwind('./tailwind.config.js')


// mix.js('resources/js/app.js', 'public/js')
//     .copy('node_modules/line-awesome/dist/line-awesome/fonts', 'public/fonts')
//     .vue()
//     .postCss('resources/css/app.css', 'public/css', [
//     require('postcss-import'),
//     require('tailwindcss'),
//     require('autoprefixer'),
// ]);
