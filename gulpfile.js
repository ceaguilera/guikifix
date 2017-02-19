'use strict';

var wiredep     = require('wiredep').stream;
var gulp        = require('gulp');
var sass        = require('gulp-sass');
var concatCss   = require('gulp-concat-css');
var minifyCss   = require('gulp-minify-css');
var concatJs    = require('gulp-concat');
var uglify      = require('gulp-uglify');
var inject      = require('gulp-inject');


/* Se copian los archivos de bower_components a la carpeta assets en web */
gulp.task('assets-copy',  () => {
    console.log("ejecuro el copy")
    gulp.src('bower_components/**/**')
    .pipe(gulp.dest('web/assets'));
});

/* Se compilan todos los archivos de scss de la carpeta app */
gulp.task('sass', () => {
    console.log("ejecuto sass");
    gulp.src('./web/frontend/app/**/*.scss')
    .pipe(sass())
    .pipe(gulp.dest('./web/frontend/app/'))
})

gulp.task('wiredep', () => {
    console.log('ejecuro el wire');
    gulp.src('./web/frontend/app/index.html')
    .pipe(wiredep({
        directory: './web/assets',
        onError: function(err){
            console.log(err.code);
        }
    }))
    .pipe(gulp.dest('./web/frontend/app/'))
})

gulp.task('inject', ['sass'], () => {
  console.log("ejecuto inject");
  var target = gulp.src('./web/frontend/app/index.html');
 // It's not necessary to read the files (will speed up things), we're only after their paths: 
  var sources = gulp.src(['./web/frontend/app/**/*.js', './web/frontend/app/**/*.css'], {read: false});
 
  return target.pipe(inject(sources))
   .pipe(gulp.dest('./web/frontend/app/'));
});

/* Se concatenan y minifican todos los archivos .css del proyecto y de los assets */
gulp.task('styles', ['assets-copy' ,'sass' ], () => {
    gulp.src(
        [
        './web/assets/bootstrap/dist/css/bootstrap.css',
        './web/frontend/app/.css'
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
          './web/frontend/app/**/*.js',
          ]
      )
  	.pipe(concatJs('scripts.js'))
    .pipe(uglify())
    .pipe(gulp.dest('web/js'))
});


gulp.task('default', ['assets-copy','sass', 'inject', 'wiredep', 'styles', 'sass', 'scripts']);