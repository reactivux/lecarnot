const mix = require('laravel-mix');
require('laravel-vue-i18n/mix');
require('dotenv').config();

mix.webpackConfig({
    resolve: {
        extensions: ['.wasm', '.mjs', '.js', '.jsx', '.json', '.ts', '.tsx', '.vue'],
    }

})
mix.ts('resources/js/app.js', 'public/js', { transpileOnly: true })
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

mix.i18n();
