// Set up dotenv config to parse .env file into node env.
require('dotenv-expand')(require('dotenv').config());

const mix = require('laravel-mix');
const autoprefixer = require('autoprefixer');

const outputDir = process.env.APP_WEBPACK_ASSET_DIR || 'public/assets';
const isDev = process.env.NODE_ENV === 'development';

const customWebpackConf = {
  module: {
    rules: [
      {
        test: /\.(woff2?|ttf|eot|svg|otf)$/,
        loader: 'file-loader',
        options: {
          name: '/fonts/[name].[ext]',
        },
      },
      {
        test: /\.(png|jpe?g|gif|ico)$/,
        loaders: [
          {
            loader: 'file-loader',
            options: {
              name: 'images/[name].[ext]',
            },
          },
          {
            loader: 'img-loader',
          },
        ],
      },
    ],
  },
};

// Use inline source maps in development.
if (isDev) {
  customWebpackConf.devtool = 'eval-source-map';
}

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

mix.setPublicPath(outputDir);

mix.autoload({
  jquery: ['$', 'jQuery', 'jquery'],
})
  .js('resources/assets/js/app.js', 'js')
  .sass('resources/assets/sass/app.scss', 'css', {
    includePaths: ['node_modules/bootstrap-sass/assets/stylesheets/'],
  })
  .copy('resources/assets/files', `${outputDir}/files`)
  .copy('resources/assets/images', `${outputDir}/images`)
  .extract(['axios', 'jquery', 'jquery.easing', 'bootstrap-sass'], '/js/vendor')
  .options({
    postCss: [
      autoprefixer(),
    ],
  })
  .webpackConfig(customWebpackConf);
