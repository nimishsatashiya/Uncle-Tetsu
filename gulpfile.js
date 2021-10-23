'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
 
sass.compiler = require('node-sass');
 
gulp.task('sass', function () {
  return gulp.src('./scss/**/*.scss')
  .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest('./css'));
});
// ./public/themes/frontend
gulp.task('watch', function () {
  gulp.watch('./scss/**/*.scss', gulp.series('sass'));
});

// var minify = require('gulp-minify');
// gulp.task('compress', function() {
//   gulp.src('js/**/*.js')
//     .pipe(minify({
//         ext:{
//             src:'-debug.js',
//             min:'.js'
//         },
//         exclude: ['tasks'],
//         ignoreFiles: ['.combo.js', '-min.js']
//     }))
//     .pipe(gulp.dest('../js'))
// });


