'use strict';

var gulp = require('gulp');
var scss = require('gulp-sass');
var concat = require('gulp-concat');
var eslint = require('gulp-eslint');
var insert = require('gulp-insert');

var assetPath = function(path) {
  return './assets/' + path;
};

gulp.task('scss', function() {
  gulp.src(assetPath('scss/style.scss'))
    .pipe(scss({ includePaths : [assetPath('scss/**/*.scss')] }).on('error', scss.logError))
    .pipe(insert.prepend(["/*",
      "Theme Name:   JAACF",
      "Theme URI:    http://jaacf.org",
      "Description:  JAACF theme",
      "Author:       Laurence Bradford, Matthew Ciampa",
      "Version:      1.0.0",
      "License:      GNU General Public License v2 or later",
      "License URI:  http://www.gnu.org/licenses/gpl-2.0.html",
      "Text Domain:  jaacf-theme-text-domain",
      "*/\n"].join('\n')
    ))
    .pipe(gulp.dest('./'));
});

/*
Theme Name: wp-bootstrap
Theme URI: http://320press.com/wpbs
Description: A simple responsive theme based on the Bootstrap framework. Includes multiple page templates, two different sidebars and a theme options panel.
Version: 3.3.1
Author: Chris Barnes
Author URI: http://cbarn.es
Tags: black, white, one-column, two-columns, flexible-width, custom-background, custom-colors, custom-menu, full-width-template, theme-options
License: GNU General Public License v2.0 & Apache License 2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html http://www.apache.org/licenses/LICENSE-2.0
*/

gulp.task('js', function() {
  gulp.src(assetPath('js/**/*.js'))
    .pipe(concat('app.js'))
    .pipe(gulp.dest(assetPath('')));
});

gulp.task('eslint', function() {
  gulp.src(assetPath('js/**/*.js'))
    .pipe(eslint({
      globals: {
        'jQuery':false,
        '$':true
      },
    }))
    .pipe(eslint.format())
    .pipe(eslint.failOnError())
});

gulp.task('watch', function() {
  gulp.watch(assetPath('scss/**/*.scss'), ['scss']);
  gulp.watch(assetPath('js/**/*.js'), ['js']);
});
