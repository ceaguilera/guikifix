'use strict';

var gulp        = require('gulp');
var sass        = require('gulp-sass');
var concatCss   = require('gulp-concat-css');
var minifyCss   = require('gulp-minify-css');
var concatJs    = require('gulp-concat');
var uglify      = require('gulp-uglify');

/* Se copian los archivos de bower_components a la carpeta assets en web */
gulp.task('assets-copy',  () => {
    console.log("ejecuro el copy")
    gulp.src('bower_components/**/**')
    .pipe(gulp.dest('web/assets'));
});

/* Se compilan todos los archivos de scss de la carpeta app */
gulp.task('sass', () => {
    console.log("ejecuto sass");
    gulp.src('./src/Guikifix/PresentationBundle/app/**/*.scss')
    .pipe(sass())
    .pipe(gulp.dest('./src/Guikifix/PresentationBundle/app/'))
})

/* Se concatenan y minifican todos los archivos .css del proyecto y de los assets */
gulp.task('styles', ['assets-copy' ,'sass' ], () => {
    gulp.src(
        [
        './web/assets/bootstrap/dist/css/bootstrap.css',
        './src/Guikifix/PresentationBundle/app/**/*.css'
        ]
    )
        .pipe(concatCss('styles.css'))
        .pipe(minifyCss())
        .pipe(gulp.dest('web/css'));
});

/* Se concatenan y minifican todos los archivos .js del proyecto y de los assets */
gulp.task('scripts', ['assets-copy'], () => {
  gulp.src(
          [
          './web/assets/jquery/dist/jquery.js',
          './web/assets/bootstrap/dist/js/bootstrap.js',
          './web/assets/angular/angular.js',
          './web/assets/angular-ui-router/release/angular-ui-router.js',
          './src/Guikifix/PresentationBundle/app/**/*.js',
          ]
      )
  	.pipe(concatJs('scripts.js'))
    .pipe(uglify())
    .pipe(gulp.dest('web/js'))
});


gulp.task('default', ['assets-copy','sass', 'styles', 'sass', 'scripts']);