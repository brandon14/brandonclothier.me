/* jshint node: true */
"use strict";
var gulp = require('gulp');
// Require gulp-changed
var changed = require('gulp-changed-in-place');
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

// Gulp config parameters
var config = {
  vendorPath: './public_html/vendor',
  cssPath: './public_html/css',
  jsPath: './public_html/js',
  gulpTimeout: 1000
};

/**
 * By default run all tasks.
 */
gulp.task('default', function() {
  gulp.start('ajax');
  gulp.start('page-functions');
  gulp.start('style');
  gulp.start('offcanvas');
  gulp.start('resume');
  gulp.start('snackbar-theme');
});

/**
 * Gulp task to minify the AJAX Javascript.
 */
gulp.task('ajax', function (cb) {
  setTimeout(function() {
    pump([
      gulp.src(config.jsPath + '/ajax.js'),
      changed({
        firstPass: true
      }),
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
        return file.base;
      }, {
        overwrite: true
      })
    ], cb);
  }, config.gulpTimeout);
});

/**
 * Gulp task to minify the page functions Javascript.
 */
gulp.task('page-functions', function (cb) {
  setTimeout(function() {
    pump([
      gulp.src(config.jsPath + '/page-functions.js'),
      changed({
        firstPass: true
      }),
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
        return file.base;
      }, {
        overwrite: true
      })
    ], cb);
  }, config.gulpTimeout);
});

/**
 * Gulp task to minify the main style CSS.
 */
gulp.task('style', function (cb) {
  setTimeout(function() {
    pump([
      gulp.src(config.cssPath + '/style.css'),
      changed({
        firstPass: true
      }),
      cssmin(),
      rename({
        suffix: '.min'
      }),
      gulp.dest(function(file) {
        return file.base;
      }, {
        overwrite: true
      })
    ], cb);
  }, config.gulpTimeout);
});

/**
 * Gulp task to minify the off canvas CSS.
 */
gulp.task('offcanvas', function (cb) {
  setTimeout(function() {
    pump([
      gulp.src(config.cssPath + '/offcanvas.css'),
      changed({
        firstPass: true
      }),
      cssmin(),
      rename({
        suffix: '.min'
      }),
      gulp.dest(function(file) {
        return file.base;
      }, {
        overwrite: true
      })
    ], cb);
  }, config.gulpTimeout);
});

/**
 * Gulp task to minify the resume CSS.
 */
gulp.task('resume', function (cb) {
  setTimeout(function() {
    pump([
      gulp.src(config.cssPath + '/resume.css'),
      changed({
        firstPass: true
      }),
      cssmin(),
      rename({
        suffix: '.min'
      }),
      gulp.dest(function(file) {
        return file.base;
      }, {
        overwrite: true
      })
    ], cb);
  }, config.gulpTimeout);
});

/**
 * Gulp task to minify the snackbar theme CSS.
 */
gulp.task('snackbar-theme', function (cb) {
  setTimeout(function() {
    pump([
      gulp.src(config.vendorPath + '/css/snackbar-theme.css'),
      changed({
        firstPass: true
      }),
      cssmin(),
      rename({
        suffix: '.min'
      }),
      gulp.dest(function(file) {
        return file.base;
      }, {
        overwrite: true
      })
    ], cb);
  }, config.gulpTimeout);
});

/**
 * Gulp task to watch for changes in the Javascript and CSS files
 */
gulp.task('watch', function() {
  gulp.watch([config.vendorPath + '/css/snackbar-theme.css'], ['snackbar-theme']);
  gulp.watch([config.cssPath + '/resume.css'], ['resume']);
  gulp.watch([config.cssPath + '/offcanvas.css'], ['offcanvas']);
  gulp.watch([config.cssPath + '/style.css'], ['style']);
  gulp.watch([config.jsPath + '/page-functions.js'], ['page-functions']);
  gulp.watch([config.jsPath + '/ajax.js'], ['ajax']);
});