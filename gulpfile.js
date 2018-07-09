"use strict";

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    newer = require('gulp-newer'),
    sourcemaps = require('gulp-sourcemaps'),
    imagemin = require('gulp-imagemin'),
    browserSync = require('browser-sync').create(),
    reload = browserSync.reload,
    webpack = require('webpack'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    watch = require('gulp-watch'),
    imgSrc = 'assets/images/originals/*',
    imgDest = 'assets/images/';

gulp.task('browser-sync', function() {
  var files = [
            'assets/sass/**/*.scss',
            'assets/js/**/*.js',
            imgSrc
        ];
  browserSync.init({
    files : files,
    proxy: 'localhost/wordpress/',
    watchOptions : {
            ignored : 'node_modules/*',
            ignoreInitial : true
        }
  });
});

gulp.task('sass', function() {
  return gulp.src('assets/sass/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(autoprefixer({ browsers: ['last 2 versions'], cascade: false }))
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest('./'))
});

gulp.task('watch', function() {
  // Watch .scss files
  gulp.watch('assets/sass/*.scss', ['sass']).on('change', browserSync.reload);
  gulp.watch('assets/sass/**/*.scss', ['sass']).on('change', browserSync.reload);
  // Watch js directory
  gulp.watch('assets/js/**/*.js', ['js']).on('change', browserSync.reload);
  // Watch original images directory
  gulp.watch(imgSrc, ['images']).on('change', browserSync.reload);
});

gulp.task('images', function() {
  return gulp.src(imgSrc, {base: 'assets/images/originals'})
      .pipe(newer(imgDest))
      .pipe(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true }))
      .pipe(gulp.dest(imgDest));
});

gulp.task('js', function(callback) {
  webpack(require('./webpack.config.js'), function(err, stats) {
    if(err) {
      console.log(err.toString());
    }
    console.log(stats.toString());
    callback();
  });
});

gulp.task('default', ['sass', 'browser-sync', 'watch', 'images', 'js']);
