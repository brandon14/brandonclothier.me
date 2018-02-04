// Set up dotenv config to parse .env file into node env.
require('dotenv-expand')(require('dotenv').config());

const gulp = require('gulp');
const rev = require('gulp-rev-all');
const revDel = require('gulp-rev-delete-original');
const imagemin = require('gulp-imagemin');

const output = process.env.APP_WEBPACK_ASSET_DIR || 'public/assets';
const hashLength = Number(process.env.APP_ASSET_HASH_LENGTH) || 32;
const assetUrl = process.env.APP_WEBPACK_ASSET_URL || 'http://localhost/assets';

const includeFilesInManifest = [
  '.css',
  '.js',
  '.jpeg',
  '.jpg',
  '.png',
  '.svg',
  '.gif',
  '.ttf',
  '.eot',
  '.otf',
  '.woff',
  '.woff2',
  '.pdf',
  '.docx',
  '.ico',
];

// Gulp task to build the assets. We take the webpack compiled assets
// and run them through gulp-rev to revision the file names. Also
// images will be processed through imagemin.
gulp.task('build', () =>
  gulp.src(`./${output}/**/*`)
    .pipe(imagemin())
    .pipe(rev.revision({
      fileNameManifest: 'mix-manifest.json',
      hashLength,
      includeFilesInManifest,
      dontGlobal: [
        /mix-manifest.json$/,
        /.php$/,
        /robots.txt$/,
        /humans.txt$/,
      ],
      // Replace abolsute URLs with the assetUrl configured in the .env file.
      prefix: assetUrl.charAt(assetUrl.length - 1) === '/' ? assetUrl : `${assetUrl}/`,
    }))
    .pipe(gulp.dest(`./${output}/`))
    .pipe(revDel())
    .pipe(rev.manifestFile())
    .pipe(gulp.dest(`./${output}/`)));
