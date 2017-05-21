const { mix } = require('laravel-mix');
const path = require('path');
const webpack = require('webpack');

const publicPath = path.resolve('public_html');
const isDev = process.env.NODE_ENV === 'development';

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

mix.setPublicPath(publicPath);

mix.webpackConfig({
  plugins: [
    new webpack.ProvidePlugin({
      jQuery: 'jquery',
      $: 'jquery',
      jquery: 'jquery',
    }),
  ],
});

mix.js('resources/assets/js/app.js', 'js')
   .sass('resources/assets/sass/app.scss', 'css', {
     includePaths: ['node_modules/bootstrap-sass/assets/stylesheets/'],
   })
   .copyDirectory('resources/assets/images', `${publicPath}/images`)
   .copyDirectory('resources/assets/files', `${publicPath}/files`)
   .copyDirectory('resources/assets/fonts', `${publicPath}/fonts`)
   .copyDirectory('resources/assets/docroot', publicPath)
   .extract(['axios', 'jquery']);

if (isDev) {
  mix.sourceMaps()
     .browserSync(process.env.MIX_BROWSERSYNC_URL);
} else {
  mix.version();
}
