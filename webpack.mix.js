// Set up dotenv config to parse .env file into node env.
require('dotenv-expand')(require('dotenv').config());

const mix = require('laravel-mix');
const autoprefixer = require('autoprefixer');
const { resolve } = require('path');

const publicPath = process.env.APP_PUBLIC_PATH || 'public';
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

mix.autoload({
  jquery: ['$', 'jQuery', 'jquery'],
})
  .js('resources/assets/js/app.js', 'js')
  .sass('resources/assets/sass/app.scss', 'css', {
    includePaths: ['node_modules/bootstrap-sass/assets/stylesheets/'],
  })
  .copyDirectory('resources/assets/images', `${publicPath}/images`)
  .copyDirectory('resources/assets/files', `${publicPath}/files`)
  .copyDirectory('resources/assets/docroot', publicPath)
  .extract(['axios', 'jquery', 'jquery.easing', 'bootstrap-sass', 'bootstrap-material-design'], '/js/vendor')
  .options({
    postCss: [
      autoprefixer(),
    ],
  });

if (isDev) {
  mix.browserSync(process.env.APP_URL || 'http://localhost:8000')
    .webpackConfig({
      devtool: 'inline-source-map',
      devServer: {
        contentBase: resolve(__dirname, publicPath),
      },
    });
} else {
  mix.version();
}
