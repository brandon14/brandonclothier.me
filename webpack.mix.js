const mix = require('laravel-mix');
const autoprefixer = require('autoprefixer');

const publicPath = 'public_html';
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
  mix.browserSync(process.env.MIX_BROWSERSYNC_URL)
    .webpackConfig({ devtool: 'inline-source-map' });
} else {
  mix.version();
}
