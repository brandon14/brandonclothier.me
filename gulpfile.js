var gulp = require('gulp');
// Require gullp-notify
var notify = require("gulp-notify") ;
// Require gulp-changed
var changed = require('gulp-changed-in-place');
// Require gulp-concat
var concat = require('gulp-concat');
// Require gulp-cssmin
var cssmin = require('gulp-cssmin');
// Require pump
var pump = require('pump');
// Require gulp-rename
var rename = require('gulp-rename');
// Require gulp-uglify
var uglify = require('gulp-uglify');
// Require gulp-babel
var babel = require('gulp-babel');
// Require gulp-sourcemaps
var sourcemaps = require('gulp-sourcemaps');

var config = {
  vendorPath: './public_html/vendor',
  cssPath: './public_html/css',
  jsPath: './public_html/js'
};

gulp.task('default', function() {
  gulp.start('ajaxJs');
  gulp.start('pageJs');
  gulp.start('style');
  gulp.start('offcanvas');
  gulp.start('resume');
  gulp.start('snackbar-theme');
});

gulp.task('ajaxJs', function (cb) {
  setTimeout(function() {
    pump([
      gulp.src(config.jsPath + '/ajax.js'),
      sourcemaps.init(),
      babel({
        presets: ['es2015']
      }),
      uglify({
        mangle: false
      }),
      rename({
        suffix: '.min'
      }),
      sourcemaps.write('.'),
      gulp.dest(function(file) {
        return config.jsPath;
      }, {
        overwrite: true
      })
    ], cb);
  }, 1000);
});

gulp.task('pageJs', function (cb) {
  setTimeout(function() {
    pump([
      gulp.src(config.jsPath + '/page-functions.js'),
      sourcemaps.init(),
      babel({
        presets: ['es2015']
      }),
      uglify({
        mangle: false
      }),
      rename({
        suffix: '.min'
      }),
      sourcemaps.write('.'),
      gulp.dest(function(file) {
        return config.jsPath;
      }, {
        overwrite: true
      })
    ], cb);
  }, 1000);
});

gulp.task('style', function (cb) {
  setTimeout(function() {
    pump([
      gulp.src(config.cssPath + '/style.css'),
      cssmin(),
      rename({
        suffix: '.min'
      }),
      gulp.dest(function(file) {
        return config.cssPath;
      }, {
        overwrite: true
      })
    ], cb);
  }, 1000);
});

gulp.task('offcanvas', function (cb) {
  setTimeout(function() {
    pump([
      gulp.src(config.cssPath + '/offcanvas.css'),
      cssmin(),
      rename({
        suffix: '.min'
      }),
      gulp.dest(function(file) {
        return config.cssPath;
      }, {
        overwrite: true
      })
    ], cb);
  }, 1000);
});

gulp.task('resume', function (cb) {
  setTimeout(function() {
    pump([
      gulp.src(config.cssPath + '/resume.css'),
      cssmin(),
      rename({
        suffix: '.min'
      }),
      gulp.dest(function(file) {
        return config.cssPath;
      }, {
        overwrite: true
      })
    ], cb);
  }, 1000);
});

gulp.task('snackbar-theme', function (cb) {
  setTimeout(function() {
    pump([
      gulp.src(config.vendorPath + '/css/snackbar-theme.css'),
      cssmin(),
      rename({
        suffix: '.min'
      }),
      gulp.dest(function(file) {
        return config.vendorPath + '/css';
      }, {
        overwrite: true
      })
    ], cb);
  }, 1000);
});