'use strict';

var gulp        = require('gulp');
var wiredep     = require('wiredep').stream;
var sass        = require('gulp-sass');
var inject      = require('gulp-inject');
var concatCss   = require('gulp-concat-css');
var minifyCss   = require('gulp-minify-css');

gulp.task('bower-copy', function () {
    console.log("ejecuro el copy")
    gulp.src('bower_components/**/**')
    .pipe(gulp.dest('web/bower_components'));
});

gulp.task('wiredep', ['bower-copy'], () => {
    console.log("wiredep");
    gulp.src('./src/Guikifix/PresentationBundle/app/index.html')
    .pipe(wiredep({
        directory: './web/bower_components/',
        onError: function(err){
            console.log(err.code);
        }
    }))
    .pipe(gulp.dest('./src/Guikifix/PresentationBundle/app/'))
});

gulp.task('sass',['wiredep'], () => {
    console.log("ejecuto sass");
    gulp.src('./src/Guikifix/PresentationBundle/app/**/*.scss')
    .pipe(sass())
    .pipe(gulp.dest('./src/Guikifix/PresentationBundle/app/'))
})

gulp.task('myCSS', ['sass'], function () {
    gulp.src('./src/Guikifix/PresentationBundle/app/**/*.css')
        .pipe(concatCss('all.css'))
        //Utilizamos la función minifyCSS
        .pipe(minifyCss())
        .pipe(gulp.dest('web/css'));
});

gulp.task('inject', ['myCSS'], () => {
  console.log("ejecuto inject");
  var target = gulp.src('./src/Guikifix/PresentationBundle/app/index.html');
  // It's not necessary to read the files (will speed up things), we're only after their paths: 
  var sources = gulp.src(['./src/Guikifix/PresentationBundle/app/**/*.js', 'web/css/all.css'], {read: false});
 
  return target.pipe(inject(sources))
    .pipe(gulp.dest('./src/Guikifix/PresentationBundle/app/'));
});

gulp.task('default', ['bower-copy','wiredep',  'myCSS', 'sass', 'inject']);