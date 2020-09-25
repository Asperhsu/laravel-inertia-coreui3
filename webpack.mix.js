const mix = require('laravel-mix');
// require('laravel-mix-bundle-analyzer');
// if (mix.isWatching()) {
//     mix.bundleAnalyzer();
// }

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .webpackConfig({
        output: {
            chunkFilename: 'js/[name].js?id=[chunkhash]'
        },
        resolve: {
            alias: {
                vue$: 'vue/dist/vue.runtime.esm.js',
                '@': path.resolve('resources/js')
            }
        }
    })
    .sourceMaps()
    .version();

